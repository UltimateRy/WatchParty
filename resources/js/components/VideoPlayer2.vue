<template>
    <div>
        <div class="py-6">
            <!--input type="file" accept="video/*" id="uploadedFile" /-->
             <ul class="chat">
                <div v-for="message in messages" :message="message" :key="message.id">
                    {{message}}
                    
                </div>
            </ul>
            <video ref="video-player" 
                    class="video-js vjs-theme-sea vjs-big-play-centered vjs-static-controls"
                    id="my-video" 
                    controls
                    preload="auto"
                    width="1280" 
                    height="750" 
                    data-setup='{}'>

                    <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4"/> 
            </video>

            <div class="flex gap-x-4 py-6">
                <div class ="bg-white rounded-lg w-24">
                    <img v-bind:src="'../images/movie-images/' + movie.image + '.jpg'" class="card-image rounded-lg w-56">
                </div>
                <br>
                <div class="truncate text-ellipsis text-primary text-3xl"> 
                    {{movie.title}}
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import videojs from 'video.js';
import 'video.js/dist/video-js.css';
var playToggle = 0;
export default {
    name: "VideoPlayer",
    props: ['party', 'user', 'movie'],
    data() {
        return {
            messages: [],
            player: null,
            party_id: this.party.id
        }
    },
    mounted() {
        const element = this.$refs['video-player']
        console.log( {element} );
        this.player = videojs(element, {
            fluid: true,
        });
        this.player.volume(0.5);

        (function startVideoPlayer() {
            var URL = window.URL || window.webkitURL;

            var playSelectedFile = function (event) {
                alert('Did something!');
            }
        })()
            
        //THIS LINE DISABLES THE PLAY BUTTON
        //this.player.controlBar.playToggle.off("click");

        this.player.bigPlayButton.on('click', event => {
                this.videoSetTime(this.player.currentTime());
                this.videoPlayAll();
        });

        this.player.controlBar.playToggle.on("click" , event => {

            if (playToggle == 0) {
                playToggle = 1;
                this.videoSetTime(this.player.currentTime());
                this.videoPauseAll();
            } else if (playToggle == 1) {
                playToggle = 0;
                this.videoSetTime(this.player.currentTime());
                this.videoPlayAll();
            }
            
        });

        this.player.controlBar.progressControl.seekBar.on('mouseup', event => {
                this.videoSetTime(this.player.currentTime());
        });

        this.listenForControl();
    },
    methods: {
        presetVid: function (event) {
            this.player = videojs(this.$refs['video-player']);
            this.player.src("http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4");
            
        },
        listenForControl() {          
            //Listen for external video control commands:
            Echo.private('parties.' + this.party.id)
                .listen('VideoScrub', (e) => {
                    this.player.currentTime(e.time);
                }
            );
            Echo.private('parties.' + this.party.id)
                .listen('VideoAction', (e) => {
                    if (e.action == "play") {
                        if (this.player.paused()) {
                            playToggle = 0;
                            this.player.play();
                        } 
                    }
                    if (e.action == "pause") {
                        if (this.player.paused()) {
                            
                        } else {
                            playToggle = 1;
                            this.player.pause();
                        }
                    }
                }
            );
        },
        videoRequestTime() {
            console.log("Requesting current time from host")
            //Implement request here
        },
        hostSendTime() {
            console.log("Sending recipient current time")
            //Implement send here
        },
        videoPauseAll() {
            axios.post("/api/pausevideo", 
                {
                    user: this.user, 
                    party: this.party, 
                    action: "pause",
                });
        },
        videoPlayAll() {
            axios.post("/api/playvideo", 
                {
                    user: this.user, 
                    party: this.party, 
                    action: "play",
                });
        },
        videoSetTime(t) {
            axios.post("/api/scrubvideo", 
                {
                    user: this.user, 
                    party: this.party, 
                    time: t
                });
        }
    },

    //  fileChange(event) {
    //      alert('Did something!')
    //      var file = document.getElementById('#uploadedFile');
    //      const element = this.$refs['video-player'];
    //      player = videojs(element);
    //      player.srcObject = file
    //      this.$refs.videoPlayer.src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"
    //  }

    beforeDestroy() {
        if (this.player) {
            this.player.dispose()
        }
    }
}
</script>