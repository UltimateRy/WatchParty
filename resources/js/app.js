require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

import Vue from 'vue'
import Test from './components/Test.vue'
import Player from './components/Player.vue'


window.Vue = require('vue');
window.Bus = new Vue();

Vue.component('test', Test).default;
Vue.component('player', Player).default;


const test = new Vue({
    el: '#test',

    components: {
        Test,
        Player
    }
});

