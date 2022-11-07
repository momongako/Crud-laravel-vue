
require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'

import Antdv from 'ant-design-vue';

Vue.use(Antdv)
import 'ant-design-vue/dist/antd.css';
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('create-component', require('./components/CreateComponent.vue').default);
Vue.component('App', require('./components/App').default);
Vue.component('pagination', require('laravel-vue-pagination'));
// router setup
import routes from './routes'
import { Table } from 'ant-design-vue';
Vue.use(VueRouter);
const router = new VueRouter({
    routes, // short for routes: routes
    mode: 'hash'
})

const app = new Vue({
    el: '#app',
    router
});
