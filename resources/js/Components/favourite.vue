<template>
  <div>
    <a
      class="btn fav-btn"
      :class="isfound == 1 ? 'btn-danger' : 'btn-white'"
      @click="AddFavourite"
    >
      <i class="far fa-bookmark"></i>
    </a>
  </div>
</template>
<script>
export default {
  props: ["clinic"],

  data() {
    return {
      isfound: 0,
    };
  },
  methods: {
    AddFavourite() {
      axios
        .post("/patient/favourite", {
          clinic_id: this.clinic,
        })
        .then((response) => {
          this.isfound = response.data;
        })
        .catch((error) => {});
    },
    MyFavourite() {
      axios
        .post("/patient/myfavourite", {
          clinic_id: this.clinic,
        })
        .then((response) => {
          this.isfound = response.data;
        })
        .catch((error) => {});
    },
  },
  mounted() {
    this.MyFavourite();
  },
};
</script>
