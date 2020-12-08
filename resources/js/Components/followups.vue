<template>
  <div class="table-responsive">
    <div class="card">
      <div class="card-body">
        <table class="table datatable text-center table-hover table-center mb-0">
          <thead>
            <tr>
              <th>Patient Name</th>
              <th>Appt Date</th>
              <th class="text-center">Paid Amount</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(followup, id) in followups" :key="id">
              <td>
                <h2 class="table-avatar float-left">
                  <a href="#" class="avatar avatar-sm mr-2"
                    ><img class="avatar-img rounded-circle"
                  /></a>
                  <a href="#">{{ followup.patient.user.name }}</a>
                </h2>
              </td>
              <td>
                {{ followup.day
                }}<span class="d-block text-info">{{ followup.time }}</span>
              </td>
              <td class="text-center">{{ followup.price }}</td>
              <td class="text-right">
                <div class="table-action">
                  <a href="#" class="btn btn-sm bg-info-light">
                    <i class="far fa-eye"></i> View followup
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
  props: ["followups", "patient"],
  data() {
    return {
      myfollowups: [],
    };
  },
  methods: {
    GetFollowups() {
      axios
        .post("/doctor/followups", {
          patient: this.patient,
        })
        .then((response) => {
          this.myfollowups = response.data;
        })
        .catch((error) => {});
    },
  },
  mounted() {
    this.myfollowups = this.followups;
    this.GetFollowups();
  },
  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("HH:mm A");
    },
  },
};
</script>
