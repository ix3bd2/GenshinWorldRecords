import Vue from 'vue'
import App from './App.vue'
import characterRoutes from './router/character';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import character from './store/modules/character/';

Vue.use(Vuex)
Vue.use(VueRouter)

// Add routes to VueRouter
const routes = [
    ...characterRoutes,
]

const router = new VueRouter({
    mode: 'history',
    routes

})

export const store = new Vuex.Store({
    // ...
    modules: {
        character
    }
});
new Vue({
    store: store,
    router,
    render: h => h(App)
})