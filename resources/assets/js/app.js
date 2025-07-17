import Vue from 'vue';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-default.css';
import CKEditor from '@ckeditor/ckeditor5-vue2';

window.Vue = require('vue');

require('./bootstrap');

require('./global-components');

Vue.use(VueToast);
Vue.use( CKEditor );

let instance = Vue.$toast.open('You did it!');

// Force dismiss specific toast
instance.dismiss();
// Dismiss all opened toast immediately
Vue.$toast.clear();

const app = new Vue({
    el: '#app'
});
