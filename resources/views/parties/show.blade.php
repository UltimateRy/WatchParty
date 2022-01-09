<!DOCTYPE html>

<html >
    
<head>
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
</head>

<body>  

    <h3>Video Playback Test</h3>

    <div id="message"></div>

    <input type="file" accept="video/*"/>
    <br>
    <br>

    <video 
        id="my-video" 
        class="video-js"
        controls 
        autoplay
        width="640" 
        height="264" 
        data-setup="{}"
    >
    </video>

    <script>
        (function localFileVideoPlayer() {
            'use strict'
            var URL = window.URL || window.webkitURL
            var displayMessage = function (message, isError) {
                var element = document.querySelector('#message')
                element.innerHTML = message
                element.className = isError ? 'error' : 'info'
            }
            var playSelectedFile = function (event) {
                var file = this.files[0]
                var type = file.type
                var videoNode = document.querySelector('video')
                var canPlay = videoNode.canPlayType(type)
                if (canPlay === '') canPlay = 'no'
                var message = 'Can play type "' + type + '": ' + canPlay
                var isError = canPlay === 'no'
                displayMessage(message, isError)

                if (isError) {
                return
                }

                var fileURL = URL.createObjectURL(file)
                videoNode.src = fileURL

            }
            var inputNode = document.querySelector('input')
            inputNode.addEventListener('change', playSelectedFile, false)
        })()
    </script>

    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>

</body>

</html>