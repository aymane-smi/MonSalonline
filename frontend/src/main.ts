import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import { createRouter,createWebHashHistory } from "vue-router";
import { routes } from './router/routers';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faRightFromBracket, faChevronDown } from '@fortawesome/free-solid-svg-icons'

library.add(faRightFromBracket, faChevronDown);

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});
createApp(App).use(router).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
