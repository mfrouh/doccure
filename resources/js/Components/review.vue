<template>
  <div>
    <div class="form-group">
      <label>Review</label>
      <div class="star-rating">
        <input id="star-5" type="radio" name="rating" value="5" v-model="rate" />
        <label for="star-5" title="5 stars">
          <i class="active fa fa-star"></i>
        </label>
        <input id="star-4" type="radio" name="rating" value="4" v-model="rate" />
        <label for="star-4" title="4 stars">
          <i class="active fa fa-star"></i>
        </label>
        <input id="star-3" type="radio" name="rating" value="3" v-model="rate" />
        <label for="star-3" title="3 stars">
          <i class="active fa fa-star"></i>
        </label>
        <input id="star-2" type="radio" name="rating" value="2" v-model="rate" />
        <label for="star-2" title="2 stars">
          <i class="active fa fa-star"></i>
        </label>
        <input id="star-1" type="radio" name="rating" value="1" v-model="rate" />
        <label for="star-1" title="1 star">
          <i class="active fa fa-star"></i>
        </label>
      </div>
    </div>
    <div class="form-group">
      <label>Your review</label>
      <textarea id="review_desc" class="form-control" v-model="review"></textarea>
    </div>
    <div class="submit-section">
      <a class="btn btn-primary submit-btn" @click="AddReview"> Add Review </a>
    </div>
  </div>
</template>
<script>
export default {
  props: ["clinic"],
  data() {
    return {
      rate: null,
      review: "",
    };
  },
  methods: {
    AddReview() {
      axios
        .post("/patient/review", {
          clinic_id: this.clinic,
          rate: this.rate,
          review: this.review,
        })
        .then((response) => {})
        .catch((error) => {});
    },
  },
};
</script>
