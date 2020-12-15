<template>
  <div class="card">
    <div class="card-header">Appointment</div>
    <div class="card-body">
      <div class="profile-sidebar">
        <div class="widget-profile pro-widget-content">
          <div class="profile-info-widget">
            <a
              :href="'/doctor/patient-profile/' + appointment.patientname"
              class="booking-doc-img"
            >
              <img :src="appointment.patientimg" alt="User Image" />
            </a>
            <div class="profile-det-info">
              <h3>{{ appointment.patientname }}</h3>
            </div>
          </div>
        </div>
      </div>

      <div class="appointment">
        <b-button class="btn btn-sm btn-warning m-2 float-right" v-b-modal.modal-1
          >Diagnose</b-button
        >
        <b-modal id="modal-1" title="Diagnose" @ok="ChangeDiagnose">
          <textarea class="form-control" v-model="diagnose" rows="4">
          {{ diagnose }}
      </textarea
          >
        </b-modal>
        <label for="">Diagnose</label>
        <textarea class="form-control" readonly rows="4">{{ diagnose }}</textarea>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: ["appointment"],
  data() {
    return {
      diagnose: this.appointment.diagnose,
    };
  },
  methods: {
    ChangeDiagnose() {
      axios
        .post("/doctor/appointment/diagnose", {
          appointment: this.appointment.id,
          diagnose: this.diagnose,
        })
        .then((response) => {
          this.diagnose = response.data;
        })
        .catch((error) => {});
    },
  },
};
</script>
