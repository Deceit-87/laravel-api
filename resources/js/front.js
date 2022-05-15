window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Vue = require('vue');
import App from './views/App.vue'
import VueRouter from 'vue-router'

import router from './router'
Vue.use(VueRouter)

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router,
});

