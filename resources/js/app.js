require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue';
import PartyList from './components/PartyList.vue';
import VideoPlayer from './components/VideoPlayer.vue';
import PartyChat from './components/PartyChat.vue';
import FriendsOnline from './components/FriendsOnline.vue';

window.Vue = require('vue');
window.Bus = new Vue();

const app = new Vue({
    el: '#app',
    components: {
        PartyList,
        VideoPlayer,
        PartyChat,
        FriendsOnline,
    }
});

