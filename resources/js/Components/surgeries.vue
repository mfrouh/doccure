<template>
  <div class="table-responsive">
    <b-modal id="modal-2" titlse="Create Surgery" @ok="CreateSurgery">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="">Hospital Name</label>
          <input
            type="text"
            v-model="hospital_name"
            class="form-control"
            placeholder="Hospital Name"
          />
        </div>
        <div class="form-group col-md-6">
          <label for="">Name</label>
          <input type="text" class="form-control" v-model="name" placeholder="Name" />
        </div>
        <div class="form-group col-md-6">
          <label for="">Day</label>
          <input type="date" class="form-control" v-model="day" placeholder="Day" />
        </div>
        <div class="form-group col-md-6">
          <label for="">Time</label>
          <input type="time" class="form-control" v-model="time" placeholder="Time" />
        </div>
        <div class="form-group col-md-6">
          <label for="">Price</label>
          <input type="price" class="form-control" v-model="price" placeholder="Price" />
        </div>
      </div>
    </b-modal>
    <div class="card">
      <div class="card-body">
        <b-button
          class="btn btn-sm btn-success m-2 float-right"
          v-if="appointment"
          v-b-modal.modal-2
          >Create Surgery</b-button
        >
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
            <tr v-for="(surgery, id) in surgeries" :key="id">
              <td>{{ surgery.name }}</td>
              <td>
                <h2 class="table-avatar">
                  <a
                    :href="'/doctor/patient-profile/' + surgery.patientusername"
                    class="avatar avatar-sm mr-2"
                  >
                    <img :src="surgery.patientimage" class="avatar-img rounded-circle" />
                  </a>
                  <a>{{ surgery.patientname }}</a>
                </h2>
              </td>
              <td>{{ surgery.day }}</td>
              <td>{{ surgery.time | Ftime }}</td>
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
  props: ["patient", "appointment"],
  data() {
    return {
      surgeries: [],
      name: "",
      day: "",
      time: "",
      price: "",
      hospital_name: "",
    };
  },
  methods: {
    Getsurgeries() {
      axios
        .post("/doctor/surgeries", {
          patient: this.patient,
        })
        .then((response) => {
          this.surgeries = response.data;
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
    CreateSurgery() {
      axios
        .post("/doctor/surgery", {
          appointment: this.appointment,
          day: this.day,
          price: this.price,
          time: this.time,
          name: this.name,
          hospital_name: this.hospital_name,
        })
        .then((response) => {})
        .catch((error) => {});
    },
  },
  mounted() {
    this.Getsurgeries();
  },
  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("hh:mm A");
    },
  },
};
</script>
