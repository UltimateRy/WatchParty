<template>
    <div>
        <p> This is the player </p>
    </div>
</template>
    
<script>
    const default_layout = "default";
    export default {
        mounted: function() {

            (function startVideoPlayer() {
                var URL = window.URL || window.webkitURL;
                player = videojs('my-video');

                var playSelectedFile = function (event) {
                    var file = this.files[0]
                    var type = file.type
                    var videoNode = document.querySelector('video')
                    var canPlay = videoNode.canPlayType(type)
                    
                    var fileURL = URL.createObjectURL(file)
                    player.src({src: fileURL, type: type});

                    player.currentTime(35);
                }
                var inputNode = document.querySelector('input')
                inputNode.addEventListener('change', playSelectedFile, false)
            })()
        }
    }
</script>
