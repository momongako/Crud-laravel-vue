
require('./bootstrap');

import Vue from 'vue';
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-component', require('./components/CreateComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({

    el: '#app',

});
