<template>
  <div>
    <a class="btn btn-danger fav-btn" @click="AddFavourite">
      <i class="far fa-bookmark"></i>
    </a>
  </div>
</template>
<script>
export default {
  props: ["clinic", "isfound"],

  data() {
    return {};
  },
  methods: {
    AddFavourite() {
      axios
        .post("/patient/favourite", {
          clinic_id: this.clinic,
        })
        .then((response) => {
          alert(response.data);
        })
        .catch((error) => {
          alert(response.data.errors);
        });
    },
  },
};
</script>
