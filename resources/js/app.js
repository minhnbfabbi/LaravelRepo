/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import { routes }  from './index';
import i18n from './i18n';
import store from './store';
import auth from './auth';
import firebase from 'firebase';

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.use(VueRouter)

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-header', require('./components/Header.vue').default);
Vue.component('pagination-custom', require('./components/Pagination.vue').default);
Vue.component('modal-users-sent', require('./components/Notify/ModalUsersSent.vue').default);

// Set global variable
Vue.prototype.$_apiUrl = '/api/';
Vue.prototype.$_error = '';

const router = new VueRouter({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
	if(!['Login', 'Register'].includes(to.name)) {
		auth.checkAuth();
	} else {
		auth.setAuthEmpty();
	}
	var dashboardVisbleLink = false;
	if(to.name == 'Dashboard') {
		dashboardVisbleLink = true;
	} 
	store.dispatch('setDashboardVisibleLink', dashboardVisbleLink);
	next();
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    router,
    i18n,
    store: store
});

export default app;