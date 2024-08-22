import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Antd from "ant-design-vue";
import { Inertia } from "@inertiajs/inertia";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Antd)
            .mount(el);
    },
    progress: {
        delay: 250,
        color: "#29d",
        includeCSS: true,
        showSpinner: true,
    },
}).then(() => {

});

Inertia.on("error", (error) => {
    // console.warn(error.detail.errors);
});
