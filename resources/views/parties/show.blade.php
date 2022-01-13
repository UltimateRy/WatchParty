<!DOCTYPE html>

<html >
    
<head>
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
</head>

<body>  

    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>


    <h1> Video Player </h1>

    <div id="message"></div>

    <input type="file" accept="video/*"/>
    <br>
    <br>

    <div id="app">
        <div class="video-inner-container">

            <video-js 
                id="my-video" 
                class="video-js"
                controls
                autoplay
                preload="auto"
                width="1280" 
                height="720" 
                data-setup="{}"
            >
            </video-js>

        </div>
    </div>

    <script>
        new Vue({
            el: '#app',

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
        })
    </script>
</body>

</html>