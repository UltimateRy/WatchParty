<template>
  <div>

        <input type="file" accept="video/*"/>

		<video-player :options="videoOptions"></video-player>
	</div>
</template>
    
<script>
    import VideoPlayer from './videoPlayer.vue'
    const default_layout = "default";
    export default {
        name: "VideoExample",
	    components: {
		    VideoPlayer
	    },
        mounted: function() {

            (function startVideoPlayer() {
                var URL = window.URL || window.webkitURL;
                //var player = videojs('my-video');
                var player = videojs.getPlayers();
                console.log(player);

                var playSelectedFile = function (event) {
                    var file = this.files[0]
                    var type = file.type
                    //var videoNode = document.querySelector('video')
                    //var canPlay = videoNode.canPlayType(type)
                    
                    var fileURL = URL.createObjectURL(file)

                    player.src({src: fileURL, type: type});

                    return {
                        videoOptions: {
                            src: fileURL, type: type,
                        }
                    }

                    //player.currentTime(35);
                }
                var inputNode = document.querySelector('input')
                inputNode.addEventListener('change', playSelectedFile, false)
            })()
        },
        data() {
            return {
                videoOptions: {
                    autoplay: true,
                    controls: true,
                    preload: "auto",
                    width: "1280" ,
                    height: "720" 
                   // sources: [
                    //    {
                   //         src:
                    //            "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4",
                    //        type: "video/mp4"
                   //     }
                   // ]
                }
            };
	    }
    }
</script>
