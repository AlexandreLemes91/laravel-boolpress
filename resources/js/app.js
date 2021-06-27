window.Vue = require('vue');

import App from './App.vue';

const root = new Vue({
    el: '#root',
    
    //server per hookkare App, come in cli
    render: h => h(App),
})