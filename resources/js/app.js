/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-component', require('./components/CreateComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

// import VueRouter from 'vue-router';
// import { routes } from './routes';

// Vue.use(VueRouter);
// const router = new VueRouter({
//     mode: 'history',
//     routes: routes
// });
const app = new Vue({
    // router: router,
    el: '#app',

});
