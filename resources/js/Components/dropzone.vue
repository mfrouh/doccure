<template>
  <div>
    <div class="form-group">
      <label>Clinic Images</label>
      <vue-dropzone
        ref="myVueDropzone"
        id="dropzone"
        :options="dropzoneOptions"
        v-on:vdropzone-success="uploadSuccess"
      ></vue-dropzone>
    </div>
    <label>Gallery</label>
    <div class="row upload-wrap dropzone">
      <div
        class="dz-preview dz-processing dz-image-preview dz-success dz-complete"
        v-for="(image, index) in gallery"
        :key="index"
      >
        <div calss="dz-image">
          <img
            :src="'/' + image.url"
            style="width: 120px; height: 120px; border-radius: 20px"
          />
          <a
            class="btn btn-icon btn-danger btn-sm"
            style="cursor: pointer"
            @click="deleteimage(image.id)"
            ><i class="fa fa-trash" aria-hidden="true"></i
          ></a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";

export default {
  components: {
    vueDropzone: vue2Dropzone,
  },
  mounted() {
    this.getgallery();
  },
  data() {
    return {
      gallery: [],
      dropzoneOptions: {
        url: "/doctor/clinic/gallery",
        thumbnailWidth: 150,
        maxFilesize: 0.5,
        headers: {
          "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content,
        },
      },
    };
  },
  methods: {
    uploadSuccess(file, response) {
      this.getgallery();
    },
    deleteimage($id) {
      axios
        .post("/doctor/clinic/gallery/delete", {
          id: $id,
        })
        .then((response) => {
          this.getgallery();
        })
        .catch((error) => {});
    },
    getgallery() {
      axios
        .get("/doctor/clinic/gallery/all")
        .then((response) => {
          this.gallery = response.data;
        })
        .catch((error) => {});
    },
  },
};
</script>
