
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
//import router from './routes';
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue';

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
//import ProductZoomer from 'vue-product-zoomer';
import vueHeadful from 'vue-headful';
import Meta from 'vue-meta';

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
Vue.use(Meta)
//Vue.use(ProductZoomer)

/*

const app = new Vue({
    el: '#app',
    router
});
*/

const routes = [
	{
      path: '/',
      name: 'ShopIndex',
      component: require('./components/shop/IndexHome.vue'),
      meta: { title: 'My Page Title' }
  },
  {
      path: '/add-product',
      name: 'AddProduct',
      component: require('./components/admin/product/Add.vue')
  },
  {
      path: '/list-product',
      name: 'ListProduct',
      component: require('./components/admin/product/ListProduct.vue')
  },
  {
      path: '/edit-product/:id',
      name: 'EditProduct',
      component: require('./components/admin/product/EditProduct.vue')
  },
  {
      path: '/:alias',
      name: 'DetailShop',
      component: require('./components/shop/DetailProduct.vue'),
      meta: {
      title: 'About Page - Example App',
      metaTags: [
        {
          name: 'description',
          content: 'The about page of our example app.'
        },
        {
          property: 'og:description',
          content: 'The about page of our example app.'
        }
      ]
    }
  },
  {
      path: '/detail/:product_name',
      name: 'SingelProduct',
      component: require('./components/shop/SingelProduct.vue')
  }
];


const router = new VueRouter({ routes });

const app = new Vue({
  router
}).$mount('#app');
