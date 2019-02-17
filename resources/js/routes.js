import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/components/Home';
import Proyectos from '@/js/components/Proyectos';
import Proyecto from '@/js/components/Proyecto';
import Users from '@/js/components/Users';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/proyectos',
            name: 'Proyectos',
            component: Proyectos
        },
        {
            path: '/proyecto/:id',
            name: 'Proyecto',
            component: Proyecto
        },
        {
            path: '/usuarios',
            name: 'users',
            component: Users
        }
    ]
});

export default router;