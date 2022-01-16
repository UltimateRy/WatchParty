require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue';
import PartyList from './components/PartyList.vue';
import VideoPlayer from './components/VideoPlayer.vue';
import PartyChat from './components/PartyChat.vue';

//import Player from './components/Player.vue'


window.Vue = require('vue');
window.Bus = new Vue();

//Vue.component('partylist', PartyList).default;
//Vue.component('videoplayer', VideoPlayer).default;

const app = new Vue({
    el: '#app',
    components: {
        PartyList,
        VideoPlayer,
        PartyChat
    }
});

