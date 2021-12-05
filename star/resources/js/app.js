require("./bootstrap");

// Import modules...
import Vue from "vue";
import {
    App as InertiaApp,
    plugin as InertiaPlugin,
    Link,
} from "@inertiajs/inertia-vue";
import PortalVue from "portal-vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";

Vue.mixin({ methods: { route } });
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(Vuetify);
Vue.component("inertia-link", Link);

const app = document.getElementById("app");

new Vue({
    //finally add this line
    vuetify: new Vuetify(),
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
