<template>
    <div>
        <input type="file" accept="video/*" id="uploadedFile"/>
        <br>

        <video ref="video-player" 
                class="video-js vjs-big-play-centered"
                id="my-video" 
                controls
                autoplay
                preload="auto"
                width="1280" 
                height="720" 
                data-setup='{}'>

                <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"/>

        </video>
    </div>
</template>



<script>
import videojs from 'video.js';
import 'video.js/dist/video-js.css'
export default {
    name: "VideoPlayer",
    
    data() {
        return {
            player: null
        }
    },

    mounted() {

        const element = this.$refs['video-player']

        console.log( {element} );

        this.player = videojs(element, {
            fluid: true,
            autoplay: true
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
            
        //this.player.src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4";
        //this.player = videojs(this.$refs['video-player'], this.options, function onPlayerReady() {
        //    console.log('onPlayerReady', this);
        //})
    },

    //methods: {
    //    fileChange(event) {
    //        alert('Did something!')
            
    //        var file = document.getElementById('#uploadedFile');
    //        const element = this.$refs['video-player'];
    //        player = videojs(element);
    //        player.srcObject = file
            //this.$refs.videoPlayer.src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"
    //    }
    //},

    beforeDestroy() {
        if (this.player) {
            this.player.dispose()
        }
    }
}
</script>