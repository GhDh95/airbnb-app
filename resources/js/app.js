import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import {createInertiaApp, Head, Link} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import MainLayout from "@/Layouts/MainLayout.vue";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        let page = pages[`./Pages/${name}.vue`]
        page.default.layout = page.default.layout || MainLayout
        return page
    },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link)
            .component('Head', Head)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
