

require('./bootstrap');
import Vue from 'vue';

import axios from 'axios'
import VueAxios from 'vue-axios'

import Router from 'vue-router'
import { routes } from './routes';


Vue.component('app', require('./App.vue').default);

Vue.use(VueAxios, axios)
Vue.use(Router)


const router = new Router({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: routes
})


const app = new Vue({
    el: '#app',
    router
});

