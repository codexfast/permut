import Login from '../components/auth/Login.vue';
import Recovery from '../components/auth/Recovery.vue';
import Register from '../components/auth/Register.vue';

export default [
  { path: '/', component: Login },
  { path: '/recovery', component: Recovery },
  { path: '/register', component: Register },
];