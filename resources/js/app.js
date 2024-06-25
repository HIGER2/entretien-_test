import './bootstrap';

import { createApp } from 'vue';

import HomaPage from './vue/HomePage.vue';
import App from './vue/App.vue';
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';

createApp(App)
    .component('HomePage', HomaPage)
    .use(ToastPlugin)
    .mount('#app')
