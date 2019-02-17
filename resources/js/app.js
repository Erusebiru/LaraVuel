import './bootstrap';
import Vue from 'vue'

import Vuetify from 'vuetify';

//import routes
import Routes from '@/js/routes.js';

//import components 
import App from '@/js/views/App'

Vue.use(Vuetify);

/*const app = new Vue({
    el: '#app',
    components: { App },
    template: `<app></app>`
});*/

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(App),
});