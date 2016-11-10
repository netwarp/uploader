require('./bootstrap');

Vue.component('example', require('./components/Example.vue'));
Vue.component('menu-editor', require('./components/MenuEditor.vue'));

const app = new Vue({
    el: '#app'
});

