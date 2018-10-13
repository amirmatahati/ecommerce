
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import router from './routes';
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
//import ProductZoomer from 'vue-product-zoomer';
import vueHeadful from 'vue-headful';

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('vue-headful', vueHeadful);

Vue.use(VueRouter);
Vue.use(BootstrapVue);
//Vue.use(ProductZoomer)

const app = new Vue({
    el: '#app',
    router
});
