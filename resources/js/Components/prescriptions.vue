<template>
  <div class="table-responsive">
    <table class="table table-hover table-center text-center mb-0">
      <thead>
        <tr>
          <th>Date</th>
          <th>Name</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(prescription, id) in prescriptions" :key="id">
          <td>{{ prescription.created_at }}</td>
          <td>
            <h2 class="table-avatar">
              <a href="#" class="avatar avatar-sm mr-2">
                <img class="avatar-img rounded-circle" alt="User Image" />
              </a>
              <a>{{ prescription.patient.user.name }}</a>
            </h2>
          </td>
          <td class="text-right">
            <div class="table-action">
              <a href="javascript:void(0);" class="btn btn-sm bg-primary-light"> <i class="fas fa-print"></i> Print </a>
              <a href="javascript:void(0);" class="btn btn-sm bg-info-light"> <i class="far fa-eye"></i> View </a>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
export default {
  props: ["prescriptions"],
  data() {
    return {};
  },
  methods: {},
};
</script>
