require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
import {router} from './routes'
import bar from './components/progress'
import App from './components/App'
import Snotify from 'vue-snotify'

Vue.use(VueRouter);
Vue.use(Snotify);
Vue.component('navigation', require('./components/Navigation.vue'));

router.beforeEach((to, from, next) => {
    bar.start()
    next()
});

const app = new Vue({
    el: '#app',
    router,
    render: app => app(App),
});
