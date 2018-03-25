require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import {router} from './routes'
import bar from './components/progress'
import App from './components/App'
import Snotify from 'vue-snotify'

Vue.use(VueRouter);
Vue.use(Snotify);

router.beforeEach((to, from, next) => {
    bar.start()
    next()
});


// const router = new VueRouter({
//     mode: 'history',
//     // base: __dirname,
//     // linkActiveClass: 'active',
//     routes
// });

Vue.component('navigation', require('./components/Navigation.vue'));

export default Vue;


// router.start(App, '#app');

// Vue.component('profile', require('./components/Profile.vue'));

// import Navigation from './components/NavigationComponent'

// new Vue(Vue.util.extend({ router }, App)).$mount('#app');
const app = new Vue({
    el: '#app',
    router,
    render: app => app(App),
});
