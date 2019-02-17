import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/components/Home';
import Proyectos from '@/js/components/Proyectos';
import Proyecto from '@/js/components/Proyecto';

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
        }
    ]
});

export default router;