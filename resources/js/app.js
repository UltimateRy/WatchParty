require('./bootstrap');

//import Alpine from 'alpinejs';

//window.Alpine = Alpine;

//Alpine.start();


import Vue from 'vue'
import Test from './components/Test.vue'


window.Vue = require('vue');
window.Bus = new Vue();

//Vue.component('parties', require('./components/Parties.vue'));
Vue.component('test', Test).default;


const test = new Vue({
    el: '#test',

    components: {
        //'parties': require('./components/Parties.vue'),
        //'test': require('./components/Test.vue'),
        Test
    }
});

