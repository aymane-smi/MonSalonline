import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import { createRouter,createWebHashHistory } from "vue-router";
import { routes } from './router/routers';
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faRightFromBracket, faChevronDown, faTrash, faCircleXmark, faClipboard } from '@fortawesome/free-solid-svg-icons'
import { createPinia } from 'pinia';

library.add(faRightFromBracket, faChevronDown, faTrash, faCircleXmark, faClipboard);

const pinia = createPinia();

const router = createRouter({
    history: createWebHashHistory(),
    routes,
});
createApp(App).use(router).use(pinia).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
