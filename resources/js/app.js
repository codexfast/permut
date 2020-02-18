require('./bootstrap');

window.Vue = require('vue');

import vuetify from './vuetify';
import routes from './routes';
import VueRouter from 'vue-router';

import App from './components/App.vue';

import { doLogin } from './requests';



const app = new Vue({
    vuetify,
    router: new VueRouter({ routes }),
    render: h => h(App),
    el: '#app',
});
