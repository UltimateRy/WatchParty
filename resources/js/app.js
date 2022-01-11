require('./bootstrap');

//import Alpine from 'alpinejs';

//window.Alpine = Alpine;

//Alpine.start();

window.Vue = require('vue');
window.Bus = new Vue();


const app = new Vue({
    el: '#app'
});

