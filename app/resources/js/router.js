import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import postList from './views/post/PostListComponent';


const routes = [
    {
        path: '/',
        component: postList
    },
];

export default new vueRouter({
    mode: "history",
    routes: routes
});
