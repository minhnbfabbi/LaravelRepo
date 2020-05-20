<template>
  <b-modal id="users_sent" title="BootstrapVue">
    <table class="table" id="notifies-tbl" v-if="(list_user.length > 0)">
      <thead class="thead-dark">
          <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Is Read</th>
          </tr>
      </thead>
      <tbody>
          <tr v-for="user in list_user" :key="user.id">
              <th scope="row">{{ user.id }}</th>
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>{{ visibleIsRead(user.id) }}</td>
          </tr>
      </tbody>
  </table>
  <h3 v-else>Không có dữ liệu</h3>
  </b-modal>
</template>
<style>
  .page-item .page-link {
      padding: 0px;
  }
  .page-item a.page-link {
      padding: 10px;
  }
</style>
<script>
  export default {
    props: [
      'list_user'
    ],
    mounted() {

    },
    data: function() {
      return {

      }
    },
    methods: {
      visibleIsRead: function (status) {
        return status == 1 ? 'Đã đọc' : 'Chưa đọc';
      }
    },
    computed: {

    },
    watch: {
      
    }
  }
</script>
