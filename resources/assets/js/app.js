
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.prototype.$eventBus = new Vue();

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('message-list', require('./components/chat/message-list.vue'));
Vue.component('create-message', require('./components/chat/create-message.vue'));
Vue.component('add-friends', require('./components/chat/add-friends.vue'));

const app = new Vue({
    el: '#app'
});
