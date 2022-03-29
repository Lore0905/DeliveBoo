import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import RestaurantMenu from './pages/RestaurantMenu.vue';
import notFound from './pages/notFound.vue';
import Checkout from './pages/Checkout.vue';


const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/restaurant-menu/:slug",
            name: "restaurant-menu",
            component: RestaurantMenu
        },
        {
            path: "/checkout",
            name: "checkout",
            component: Checkout
        },
        {
            path: "/*",
            name: 'not-found',
            component: notFound,
        }
    ]
});

export default router;