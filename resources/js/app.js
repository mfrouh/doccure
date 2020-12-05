require('./bootstrap');

import Vue from 'vue';

// import { InertiaApp } from '@inertiajs/inertia-vue';
// import { InertiaForm } from 'laravel-jetstream';
// import PortalVue from 'portal-vue';

// Vue.mixin({ methods: { route } });
// Vue.use(InertiaApp);
// Vue.use(InertiaForm);
// Vue.use(PortalVue);

Vue.component('appointment',require('./Components/appointment.vue').default);
Vue.component('appointments',require('./Components/appointments.vue').default);
Vue.component('surgeries',require('./Components/surgeries.vue').default);
Vue.component('followups',require('./Components/followups.vue').default);
Vue.component('prescriptions',require('./Components/prescriptions.vue').default);

// const app = document.getElementById('app');

// new Vue({
//     render: (h) =>
//         h(InertiaApp, {
//             props: {
//                 initialPage: JSON.parse(app.dataset.page),
//                 resolveComponent: (name) => require(`./Pages/${name}`).default,
//             },
//         }),
// }).$mount(app);

var app = new Vue({
    el: '#app',
    data: {

    }
  })
