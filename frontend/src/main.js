import Vue from 'vue'
import App from './App.vue'
import characterRoutes from './router/character';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import character from './store/modules/character/';
import homePage from './components/home/HomePage.vue';
import patchchar from './store/modules/patchchar/';
import AOS from 'aos'
import 'aos/dist/aos.css'
import weaponRoutes from './router/weapon';
import weapon from './store/modules/weapon/';
import artifactRoutes from './router/artifact';
import artifact from './store/modules/artifact/';
import buffRoutes from './router/buff';
import spiralAbyssRoutes from './router/spiralAbyss';

import buff from './store/modules/buff/';

Vue.use(Vuex)
Vue.use(VueRouter)
const routes = [

    ...characterRoutes,
    ...artifactRoutes,
    ...weaponRoutes,
    ...buffRoutes,
    ...spiralAbyssRoutes,
    { path: '/', name: 'Home', component: homePage },


]

const router = new VueRouter({
    routes,
    scrollBehavior() {
        return { x: 0, y: 0 };
    },

})

export const store = new Vuex.Store({
    // ...
    modules: {
        character,
        artifact,
        patchchar,
        buff,
        weapon
    }
});
new Vue({
    store: store,
    router,
    mounted() {
        AOS.init()
    },
    render: h => h(App),
}).$mount('#app')