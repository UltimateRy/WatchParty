<template>
    <div>
        <input type="file" accept="video/*" id="file" v-on:change="fileChange"/>
        <br>

        <video ref="videoPlayer" 
                class="video-js"
                id="my-video" 
                controls
                autoplay
                preload="auto"
                width="1280" 
                height="720" 
                data-setup="{}">
        </video>
    </div>
</template>



<script>
import videojs from 'video.js';
import 'video.js/dist/video-js.css'
export default {
    name: "VideoPlayer",
    props: {
        options: {
            type: Object,
            default() {
                return {};
            }
        }
    },
    data() {
        return {
            player: null
        }
    },
    mounted() {
        this.player = videojs(this.$refs.videoPlayer, this.options, function onPlayerReady() {
            console.log('onPlayerReady', this);
        })
    },
    methods: {
        fileChange(event) {
          alert('Did something!')
          this.$refs.videoPlayer.src = "http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4"
        }
    },
    beforeDestroy() {
        if (this.player) {
            this.player.dispose()
        }
    }
}
</script>