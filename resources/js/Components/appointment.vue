<template>
  <div class="row">
    <b-button class="btn btn-sm btn-warning m-2" v-b-modal.modal-1>Diagnose</b-button>
    <b-modal id="modal-1" title="Diagnose" @ok="ChangeDiagnose">
      <textarea class="form-control" v-model="diagnose" rows="4">
          {{ appointment.diagnose }}
      </textarea>
    </b-modal>
    <b-button class="btn btn-sm btn-success m-2" v-b-modal.modal-2
      >Create Surgery</b-button
    >
    <b-modal id="modal-2" title="Create Surgery" @ok="CreateSurgery">
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
    <b-button class="btn btn-sm btn-secondary m-2" v-b-modal.modal-3
      >Create Follow Ups</b-button
    >
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
  </div>
</template>
<script>
export default {
  props: ["appointment"],
  data() {
    return {
      diagnose: this.appointment.diagnose,
      name: "",
      day: "",
      time: "",
      price: "",
      hospital_name: "",
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
          this.diagnose = this.appointment.diagnose;
        })
        .catch((error) => {});
    },
    CreateSurgery() {
      axios
        .post("/doctor/surgery", {
          appointment: this.appointment.id,
          day: this.day,
          price: this.price,
          time: this.time,
          name: this.name,
          hospital_name: this.hospital_name,
        })
        .then((response) => {})
        .catch((error) => {});
    },
    CreateFollowup() {
      axios
        .post("/doctor/followup", {
          appointment: this.appointment.id,
          day: this.day,
          price: this.price,
          time: this.time,
          diagnose: this.diagnose,
        })
        .then((response) => {})
        .catch((error) => {});
    },
  },
};
</script>
