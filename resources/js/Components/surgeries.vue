<template>
  <div class="table-responsive">
    <div class="card">
      <div class="card-body">
        <table class="table datatable table-hover table-center mb-0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Patient Name</th>
              <th>Day</th>
              <th>Time</th>
              <th>Hospital Name</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(surgery, id) in mysurgeries" :key="id">
              <td>{{ surgery.name }}</td>
              <td>
                <h2 class="table-avatar">
                  <a href="#" class="avatar avatar-sm mr-2">
                    <img :src="surgery.patientimage" class="avatar-img rounded-circle" />
                  </a>
                  <a>{{ surgery.patientname }}</a>
                </h2>
              </td>
              <td>{{ surgery.day }}</td>
              <td>{{ surgery.time }}</td>
              <td>{{ surgery.hospital_name }}</td>
              <td>{{ surgery.price }}</td>
              <td class="text-right">
                <div class="table-action">
                  <a class="btn btn-sm bg-info-light" @click="deletesurgery(surgery.id)"
                    ><i class="fa fa-trash" aria-hidden="true"></i
                  ></a>
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
  props: ["surgeries", "patient"],
  data() {
    return {
      mysurgeries: [],
    };
  },
  methods: {
    Getsurgeries() {
      axios
        .post("/doctor/surgeries", {
          patient: this.patient,
        })
        .then((response) => {
          this.mysurgeries = response.data;
        })
        .catch((error) => {});
    },
    deletesurgery($id) {
      axios
        .delete("/doctor/surgery/" + $id)
        .then((response) => {
          this.Getsurgeries();
        })
        .catch((error) => {});
    },
  },
  mounted() {
    this.mysurgeries = this.surgeries;
    this.Getsurgeries();
  },
  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("HH:mm A");
    },
  },
};
</script>
