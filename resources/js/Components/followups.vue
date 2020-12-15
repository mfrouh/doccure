<template>
  <div class="table-responsive">
    <b-modal id="modal-3" title="Create Follow Up" @ok="CreateFollowup">
      <div class="row">
        <div class="form-group col-md-12">
          <label for="">Diagnose</label>
          <textarea class="form-control" v-model="diagnose" rows="4"> </textarea>
        </div>
        <div class="form-group col-md-4">
          <label for="">Day</label>
          <input type="date" class="form-control" v-model="day" placeholder="Day" />
        </div>
        <div class="form-group col-md-4">
          <label for="">Time</label>
          <input type="time" class="form-control" v-model="time" placeholder="Time" />
        </div>
        <div class="form-group col-md-4">
          <label for="">Price</label>
          <input type="price" class="form-control" v-model="price" placeholder="Price" />
        </div>
      </div>
    </b-modal>
    <div class="card">
      <div class="card-body">
        <b-button
          class="btn btn-sm btn-secondary m-2 float-right"
          v-if="appointment"
          v-b-modal.modal-3
          >Create Follow Ups</b-button
        >
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
                  <a
                    :href="'/doctor/patient-profile/' + followup.patientusername"
                    class="avatar avatar-sm mr-2"
                    ><img :scr="followup.patientimg" class="avatar-img rounded-circle"
                  /></a>
                  <a :href="'/doctor/patient-profile/' + followup.patientusername">{{
                    followup.patientname
                  }}</a>
                </h2>
              </td>
              <td>
                {{ followup.day
                }}<span class="d-block text-info">{{ followup.time | Ftime }}</span>
              </td>
              <td class="text-center">{{ followup.price }}</td>
              <td class="text-right">
                <div class="table-action">
                  <a
                    @click="deletefollowup(followup.id)"
                    class="btn btn-sm bg-info-light"
                  >
                    <i class="fe fe-trash"></i>
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
  props: ["patient", "appointment"],
  data() {
    return {
      followups: [],
      errors: [],
      diagnose: "",
      name: "",
      day: "",
      time: "",
      price: "",
    };
  },
  mounted() {
    this.GetFollowups();
  },
  methods: {
    GetFollowups() {
      axios
        .post("/doctor/followups", {
          patient: this.patient,
          appointment: this.appointment,
        })
        .then((response) => {
          this.followups = response.data;
        })
        .catch((error) => {});
    },
    deletefollowup($id) {
      axios
        .delete("/doctor/followup/" + $id)
        .then((response) => {
          this.GetFollowups();
        })
        .catch((error) => {});
    },
    CreateFollowup() {
      axios
        .post("/doctor/followup", {
          appointment: this.appointment,
          day: this.day,
          price: this.price,
          time: this.time,
          diagnose: this.diagnose,
        })
        .then((response) => {
          this.GetFollowups();
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },

  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("hh:mm A");
    },
  },
};
</script>
