window.Vue = require('vue');
window.axios = require('axios');

import App from './App.vue';
import router from './routes';

const root = new Vue({
    el: '#root',
    router,
    
    //server per hookkare App, come in cli
    render: h => h(App),
})