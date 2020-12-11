require('./bootstrap');

import Vue from 'vue';
import moment from 'moment';
Vue.use(require('vue-moment'));
import { BootstrapVue } from 'bootstrap-vue'

Vue.use(BootstrapVue)

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
Vue.component('booking',require('./Components/booking.vue').default);
Vue.component('review',require('./Components/review.vue').default);
Vue.component('favourite',require('./Components/favourite.vue').default);
Vue.component('dropzone',require('./Components/dropzone.vue').default);


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
