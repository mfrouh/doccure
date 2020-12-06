<template>
  <div class="card booking-schedule schedule-widget">
    <div class="schedule-header">
      <div class="row">
        <div class="col-md-12">
          <div class="day-slot text-center" v-if="step == 1">
            <h1>
              <span class="slot-date">Select Day</span>
            </h1>
          </div>
          <div class="day-slot text-center" v-if="step == 2">
            <h1>
              <span class="slot-date">{{ day }}</span>
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="schedule-cont">
      <div class="row" v-if="step == 1">
        <div class="col-md-2 p-2" v-for="(d, id) in days" :key="id">
          <a
            @click="SetDay(d)"
            class="btn btn-sm"
            :class="d === day ? 'btn-secondary' : 'btn-success'"
          >
            <span>{{ d | Fday }}</span>
          </a>
        </div>
      </div>
      <div class="row" v-if="step == 2">
        <div class="col-md-2 p-2" v-for="(t, id) in times" :key="id">
          <a
            class="btn btn-sm"
            @click="SetTime(t.time)"
            :class="
              t.time === time && t.booked == 0
                ? 'btn-secondary'
                : t.booked == 1
                ? 'btn-danger disabled'
                : 'btn-success'
            "
          >
            <span>{{ t.time | Ftime }}</span>
          </a>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <a
        class="btn btn-info btn-sm float-right"
        @click="NextStep"
        v-if="step == 1 && day != ''"
      >
        <span>Select Time</span>
      </a>
      <a class="btn btn-info btn-sm float-left" @click="BackStep" v-if="step == 2">
        <span>Back</span>
      </a>
      <a
        class="btn btn-primary btn-sm float-right"
        @click="Booking"
        v-if="step == 2 && time != ''"
      >
        <span>save</span>
      </a>
    </div>
  </div>
</template>

<script>
export default {
  props: ["clinic"],
  data() {
    return {
      step: 1,
      time: "",
      day: "",
      days: [],
      times: [],
    };
  },
  methods: {
    SetTime($time) {
      this.time = $time;
      localStorage.time = $time;
    },
    SetDay($day) {
      this.day = $day;
      localStorage.day = $day;
    },
    Booking() {
      axios
        .post("/patient/booking", {
          clinic_id: this.clinic,
          day: this.day,
          time: this.time,
        })
        .then((response) => {
          this.GetTimes();
          alert("booking sucess");
        })
        .catch((error) => {});
    },
    NextStep() {
      this.step = 2;
      localStorage.step = 2;
      this.GetTimes();
    },
    BackStep() {
      this.step = 1;
      localStorage.step = 1;
      this.GetDays();
    },
    GetDays() {
      axios
        .post("/patient/booking/day", {
          clinic: this.clinic,
        })
        .then((response) => {
          this.days = response.data;
        })
        .catch((error) => {});
    },
    GetTimes() {
      axios
        .post("/patient/booking/time", {
          clinic: this.clinic,
          day: this.day,
        })
        .then((response) => {
          this.times = response.data;
        })
        .catch((error) => {});
    },
  },
  mounted() {
    if (!localStorage.step) {
      localStorage.step = 1;
      this.step = 1;
    } else {
      this.step = localStorage.step;
      this.day = localStorage.day;
      this.time = localStorage.time;
    }
    if (this.step == 1) {
      this.step = 1;
      this.GetDays();
    }
    if (this.step == 2) {
      this.step = 2;
      this.GetTimes();
    }
  },
  computed: {},
  filters: {
    Ftime: function (date) {
      return moment("2020-12-12T" + date).format("HH:mm A");
    },
    Fday: function (date) {
      return moment(date).format("dddd,D-M-YYYY");
    },
  },
};
</script>
