<template>
  <div class="table-responsive">
    <div class="card">
      <div class="card-body">
        <table class="table datatable table-hover table-center text-center mb-0">
          <thead>
            <tr>
              <th>Date</th>
              <th>Patient Name</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(prescription, id) in prescriptions" :key="id">
              <td>{{ prescription.created_at }}</td>
              <td>
                <h2 class="table-avatar">
                  <a
                    :href="'/doctor/patient-profile/' + prescription.patientusername"
                    class="avatar avatar-sm mr-2"
                  >
                    <img class="avatar-img rounded-circle" alt="User Image" />
                  </a>
                  <a>{{ prescription.patientname }}</a>
                </h2>
              </td>
              <td class="text-right">
                <div class="table-action">
                  <a
                    :href="'/doctor/prescription/' + prescription.id"
                    class="btn btn-sm bg-info-light"
                  >
                    <i class="far fa-eye"></i> View
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
  props: ["prescriptions", "patient"],
  data() {
    return {
      myprescriptions: [],
    };
  },
  methods: {
    Getprescriptions() {
      axios
        .post("/doctor/prescriptions", {
          patient: this.patient,
        })
        .then((response) => {
          this.myprescriptions = response.data;
        })
        .catch((error) => {});
    },
  },
  mounted() {
    this.myprescriptions = this.prescriptions;
    this.Getprescriptions();
  },
  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("hh:mm A");
    },
  },
};
</script>
