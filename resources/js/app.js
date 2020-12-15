require('./bootstrap');

import Vue from 'vue';
import moment from 'moment';
Vue.use(require('vue-moment'));
import { BootstrapVue } from 'bootstrap-vue'

Vue.use(BootstrapVue)

Vue.component('appointment',require('./Components/appointment.vue').default);
Vue.component('appointments',require('./Components/appointments.vue').default);
Vue.component('surgeries',require('./Components/surgeries.vue').default);
Vue.component('followups',require('./Components/followups.vue').default);
Vue.component('prescriptions',require('./Components/prescriptions.vue').default);
Vue.component('booking',require('./Components/booking.vue').default);
Vue.component('review',require('./Components/review.vue').default);
Vue.component('favourite',require('./Components/favourite.vue').default);
// Vue.component('dropzone',require('./Components/dropzone.vue').default);

var app = new Vue({
    el: '#app',
    data: {

    }
  })
