require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue'
import PartyList from './components/PartyList.vue'
import Player from './components/Player.vue'
import VideoPlayer from './components/videoPlayer.vue'


window.Vue = require('vue');
window.Bus = new Vue();

Vue.component('partylist', PartyList).default;
Vue.component('player', Player).default;
Vue.component('videoPlayer', VideoPlayer).default;


const app = new Vue({
    el: '#app',

    components: {
        PartyList,
        Player,
        VideoPlayer
    }
});

