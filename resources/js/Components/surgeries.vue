<template>
  <div class="table-responsive">
    <table class="table table-hover table-center mb-0">
      <thead>
        <tr>
          <th>Name</th>
          <th>Patient Name</th>
          <th>Day</th>
          <th>Time</th>
          <th>Hospital Name</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(surgery, id) in surgeries" :key="id">
          <td>{{ surgery.name }}</td>
          <td>
            <h2 class="table-avatar">
              <a href="#" class="avatar avatar-sm mr-2">
                <img class="avatar-img rounded-circle" />
              </a>
              <a>{{ surgery.patient.user.name }}</a>
            </h2>
          </td>
          <td>{{ surgery.day }}</td>
          <td>{{ surgery.time }}</td>
          <td>{{ surgery.hospital_name }}</td>
          <td>{{ surgery.price }}</td>
          <td class="text-right">
            <div class="table-action">
              <a><i class="fa fa-trash" aria-hidden="true"></i></a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props: ["surgeries"],
  data() {
    return {};
  },
  methods: {},
};
</script>
