<template>
  <div class="table-responsive">
    <div class="card">
      <div class="card-body">
        <table class="table datatable text-center table-hover table-center mb-0">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Appt Date</th>
              <th>Booking Date</th>
              <th>State</th>
              <th class="text-center">Paid Amount</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(appointment, id) in myappointments" :key="id">
              <td>
                <h2 class="table-avatar float-left">
                  <a href="#" class="avatar avatar-sm mr-2"
                    ><img class="avatar-img rounded-circle" :scr="appointment.patientimg"
                  /></a>
                  <a href="#">{{ appointment.patientname }}</a>
                </h2>
              </td>
              <td>
                {{ appointment.day
                }}<span class="d-block text-info">{{ appointment.time | Ftime }}</span>
              </td>
              <td>
                {{ appointment.booking_day
                }}<span class="d-block text-info">{{
                  appointment.booking_time | Ftime
                }}</span>
              </td>
              <td>{{ appointment.state }}</td>
              <td class="text-center">{{ appointment.price }}</td>
              <td class="text-right">
                <div class="table-action">
                  <a
                    class="btn btn-sm bg-info-light"
                    :href="'/doctor/appointment/' + appointment.id"
                  >
                    <i class="fe fe-eye"></i> View
                  </a>
                  <a
                    v-if="appointment.state == 'pending'"
                    @click="ChangeState('confirm', appointment.id)"
                    class="btn btn-sm bg-success-light"
                  >
                    <i class="fe fe-check"></i> Confirm
                  </a>
                  <a
                    v-if="appointment.state == 'pending'"
                    @click="ChangeState('cancel', appointment.id)"
                    class="btn btn-sm bg-danger-light"
                  >
                    <i class="fe fe-times"></i> Cancel
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";
export default {
  props: ["appointments", "patient"],
  data() {
    return {
      myappointments: [],
    };
  },
  methods: {
    ChangeState($state, $id) {
      axios
        .post("/doctor/appointment/changestate", {
          id: $id,
          state: $state,
        })
        .then((response) => {
          this.GetAppointment();
        })
        .catch((error) => {});
    },
    GetAppointment() {
      axios
        .post("/doctor/appointments", {
          patient: this.patient,
        })
        .then((response) => {
          this.myappointments = response.data;
        })
        .catch((error) => {});
    },
  },
  mounted() {
    this.myappointments = this.appointments;
    this.GetAppointment();
  },
  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("hh:mm A");
    },
  },
};
</script>
