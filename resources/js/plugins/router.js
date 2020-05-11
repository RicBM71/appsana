import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAnalytics from 'vue-analytics';

import Home from '../components/Home.vue';

Vue.use(VueRouter)

// Configuration VueAnalytics
Vue.use(VueAnalytics, {
    id: 'UA-1457871-2',
    router
  });



let routes = [
    {path: '/dash', component: Home},
    // {path: '*', component: NotFoundView}
];

export default  new VueRouter({
    mode: 'history',
    routes, // short for `routes: routes`
    render: h => h(App)
});
