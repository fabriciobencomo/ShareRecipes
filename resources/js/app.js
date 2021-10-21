/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import 'sweetalert2/dist/sweetalert2.min.css';
import VueSweetAlert2 from 'vue-sweetalert2';

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.use(VueSweetAlert2);
Vue.config.ignoredElements = ['trix-editor']
Vue.component('time-component', require('./components/TimeComponent.vue').default);
Vue.component('delete-component', require('./components/DeleteComponent.vue').default);
Vue.component('like-component', require('./components/LikeButtonComponent.vue').default);

console.log(Vue.prototype)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$('.like-btn').on('click', function() {
    $(this).toggleClass('like-active');
});

$('.clap-btn').on('click', function() {
    $(this).toggleClass('clap-active');
});
