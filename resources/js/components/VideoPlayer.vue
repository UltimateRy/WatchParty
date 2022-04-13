<template>
    <div>
        <div class="py-6">
            <input type="file" accept="video/*" id="uploadedFile" />
            <br>
            <br>
            <button v-on:click="presetVid" class="float-left text-right bg-cyan-500 hover:bg-red-700 text-white py-2 px-6 rounded-full" >Load Preselected File</button>
            <br>
            <br> <ul class="chat">
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

                    <!-- <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4"/> -->
            </video>
        </div>
    </div>
</template>


<script>
import videojs from 'video.js';
import 'video.js/dist/video-js.css';
var playToggle = 0;
export default {
    name: "VideoPlayer",
    props: ['party', 'user'],
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
                //var file = this.files[0]
                //var type = file.type
                //var videoNode = videojs('my-video')
                //var canPlay = videoNode.canPlayType(type)
                    
                //var fileURL = URL.createObjectURL(file)
                //console.log( fileURL );
                //console.log( type );

                //this.player.src({src: "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerEscapes.mp4", type: type});
                //player.currentTime(35);
            }
            var inputNode = document.getElementById('uploadedFile')
            inputNode.addEventListener('change', playSelectedFile, false)
        })()
            
        //THIS LINE DISABLES THE PLAY BUTTON
        //COULD BE USED WHEN HOST PRIVILGES IS IMPLEMENTED
        //this.player.controlBar.playToggle.off("click");

        this.player.bigPlayButton.on('click', event => {
                console.log("Clicked play");
                this.videoSetTime(this.player.currentTime());
                this.videoPlayAll();
        });

        this.player.controlBar.playToggle.on("click" , event => {

            if (playToggle == 0) {
                playToggle = 1;
                console.log("Clicked pause");
                this.videoSetTime(this.player.currentTime());
                this.videoPauseAll();
            } else if (playToggle == 1) {
                playToggle = 0;
                console.log("Clicked play");
                this.videoSetTime(this.player.currentTime());
                this.videoPlayAll();
            }
            
        });

        this.player.controlBar.progressControl.seekBar.on('mouseup', event => {
                console.log("Seeking to : " + this.player.currentTime());
                this.videoSetTime(this.player.currentTime());
        });

        this.listenForControl();
        //this.player.src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4";
        //this.player = videojs(this.$refs['video-player'], this.options, function onPlayerReady() {
        //    console.log('onPlayerReady', this);
        //})
    },
    methods: {
        presetVid: function (event) {
            this.player = videojs(this.$refs['video-player']);
            this.player.src("http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4");


        },
        listenForControl() {          
            //Listen for external commands:

            Echo.private('parties.' + this.party.id)
                .listen('VideoScrub', (e) => {
                    console.log(e);
                    //this.messages.push(e);
                    this.player.currentTime(e.time);
                }
            );
            Echo.private('parties.' + this.party.id)
                .listen('VideoAction', (e) => {
                    console.log(e);
                    
                    if (e.action == "play") {
                        console.log("Recieved play command");

                        if (this.player.paused()) {
                            playToggle = 0;
                            console.log("Began playing Video");
                            this.player.play();
                        } else {
                            console.log("Video was already playing");
                        }
                    }
                    if (e.action == "pause") {
                        console.log("Recieved pause command");

                        if (this.player.paused()) {
                            console.log("Video was already paused");
                        } else {
                            playToggle = 1;
                            console.log("Paused the Video");
                            this.player.pause();
                            
                        }
                    }
                }
            );
        },
        videoPauseAll() {
            console.log("Sending pause command");
            axios.post("/api/pausevideo", 
                {
                    user: this.user, 
                    party: this.party, 
                    action: "pause",
                })
                .then((response) => {
                    //this.messages.push(response.data);
                    //this.player.pause();
                });
        },
        videoPlayAll() {
            console.log("Sending play command");
            axios.post("/api/playvideo", 
                {
                    user: this.user, 
                    party: this.party, 
                    action: "play",
                })
                .then((response) => {
                    //this.messages.push(response.data);
                    //this.player.play();
                });
        },
        videoSetTime(t) {
            axios.post("/api/scrubvideo", 
                {
                    user: this.user, 
                    party: this.party, 
                    time: t
                })
                .then((response) => {
                    //this.messages.push(response.data);
                    //this.player.currentTime(t);
                });
            //this.player.currentTime(t);
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