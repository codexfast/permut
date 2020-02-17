require('./bootstrap');

window.Vue = require('vue');

import vuetify from './vuetify'
import App from './components/App.vue';
import Layout from './components/Baseline.vue';

const app = new Vue({
    vuetify,
    render: h => h(Layout),
    el: '#app',
});
