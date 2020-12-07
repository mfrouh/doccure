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
                }}<span class="d-block text-info">{{ appointment.time }}</span>
              </td>
              <td>
                {{ appointment.booking_day
                }}<span class="d-block text-info">{{ appointment.booking_time }}</span>
              </td>
              <td>{{ appointment.state }}</td>
              <td class="text-center">{{ appointment.price }}</td>
              <td class="text-right">
                <div class="table-action">
                  <a class="btn btn-sm bg-info-light">
                    <i class="far fa-eye"></i> View
                  </a>
                  <a
                    v-if="appointment.state == 'pending'"
                    @click="ChangeState('confirm', appointment.id)"
                    class="btn btn-sm bg-success-light"
                  >
                    <i class="fas fa-check"></i> Confirm
                  </a>
                  <a
                    v-if="appointment.state == 'pending'"
                    @click="ChangeState('cancel', appointment.id)"
                    class="btn btn-sm bg-danger-light"
                  >
                    <i class="fas fa-times"></i> Cancel
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
export default {
  props: ["appointments"],
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
    GetAppointment($state, $id) {
      axios
        .post("/doctor/appointments")
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
};
</script>
