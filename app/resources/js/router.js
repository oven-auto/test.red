import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import postList from './views/post/PostListComponent';
import postShow from './views/post/PostShowComponent';


const routes = [
    {
        path: '/',
        component: postList
    },
    {
        path: '/post/:slug',
        component: postShow
    },
];

export default new vueRouter({
    mode: "history",
    routes: routes,
    props: true
});
