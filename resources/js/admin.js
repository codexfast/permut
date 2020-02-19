require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import { routes } from './routes_admin';
import StoreData from './store';
import App from './components/admin/App.vue';
import VueProgressBar from 'vue-progressbar'
import { initialize_admin } from './helpers/general_admin';
import Loading from 'vue-loading-overlay';
import 'vue-loading-overlay/dist/vue-loading.css';





import InfiniteLoading from 'vue-infinite-loading';
Vue.use(InfiniteLoading, { /* options */ });

import CripNotice from 'crip-vue-notice'
Vue.use(CripNotice)

Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes,
    scrollBehavior: (to, from, savedPosition) =>{
        if (savedPosition){
            return savedPosition;
        }else if (to.hash){
            return {
                selector: to.hash
            }
        } else {
            return {x:0, y:0}
        }
    }
});
const options = {
    color: '#631b77',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}
Vue.use(VueProgressBar, options)
Vue.use(Loading);

initialize_admin(store, router);


const admin = new Vue({
    el: '#admin',
    router,
    store,
    components: {
        App
    }
});