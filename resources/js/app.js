require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue';
import PartyList from './components/PartyList.vue';
import VideoPlayer from './components/VideoPlayer.vue';
import PartyChat from './components/PartyChat.vue';
import FriendsOnline from './components/FriendsOnline.vue';
import FriendsList from './components/FriendsList.vue';
import FriendRequests from './components/FriendRequests.vue';
import PopularMovies from './components/PopularMovies.vue';
import AddFriends from './components/AddFriends.vue';
import SelectMovie from './components/SelectMovie.vue';
import InviteFriends from './components/InviteFriends.vue';
import ShowMovie from './components/ShowMovie.vue';

window.Vue = require('vue');
window.Bus = new Vue();

const app = new Vue({
    el: '#app',
    components: {
        PartyList,
        VideoPlayer,
        PartyChat,
        FriendsOnline,
        FriendsList,
        FriendRequests,
        PopularMovies,
        AddFriends,
        SelectMovie,
        InviteFriends,
        ShowMovie,
    }
});

