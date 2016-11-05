
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var Vue = require('vue');
Vue.use(require('vue-resource'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


//Vue.component('example', require('./components/Example.vue'));
Vue.component('comments', require('./components/Comments.vue'));
Vue.component('favorite', require('./components/Favorite.vue'));
Vue.component('rate', require('./components/Rate.vue'));


const app = new Vue({
    el: '#app'
});
