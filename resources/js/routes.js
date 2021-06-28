import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Home.vue';
import Blog from './pages/Blog.vue';
import Show from './pages/Show.vue';
import NotFound from './pages/NotFound.vue';

//attivazione router
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },{
            path: '/blog',
            name: 'blog',
            component: Blog
        },{
            path: '/blog/:slug',
            name: 'show',
            component: Show
        },{
            path: '*',
            component: NotFound
        }
    ]
})

export default router;