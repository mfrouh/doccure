<template>
  <div class="row">
    <div class="col-md-12">
      <label for="">Diagnose</label>
      <textarea class="form-control" v-model="diagnose" rows="4">
          {{ appointment.diagnose }}
      </textarea>
    </div>
    <div class="col-md-12 text-center">
      <input type="submit" value="save" class="btn btn-primary" @click="ChangeDiagnose" />
    </div>
  </div>
</template>
<script>
export default {
  props: ["appointment"],
  data() {
    return {
      diagnose: "",
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
  },
};
</script>
