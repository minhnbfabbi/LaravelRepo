<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ $t('dashboard.title') }}</div>

          <div class="card-body">
              <table class="table" id="notifies-tbl">
                  <thead class="thead-dark">
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Content</th>
                          <th scope="col">Link</th>
                          <th scope="col">Users sent</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr v-for="item in items" :key="item.id">
                          <th scope="row">{{ item.id }}</th>
                          <td>{{ item.title }}</td>
                          <td>{{ item.content }}</td>
                          <td>
                              <router-link :to="{path: linkItem + item.id}">Link</router-link>
                          </td>
                          <td>
                            <b-button v-b-modal.users_sent @click="getListUsersSent(item.id)">View</b-button>
                          </td>
                      </tr>
                  </tbody>
              </table>

              <!-- <b-table
                  id="notifies-tbl"
                  :items="items"
                  :per-page="perPage"
                  :current-page="currentPage"
              ></b-table> -->
              <!-- <b-pagination
                  v-model="currentPage"
                  :total-rows="totalItem"
                  :per-page="perPage"
                  aria-controls="notifies-tbl"
                  @change="changePage()"
              >
                  <template v-slot:page="{ page, active }">
                      <b v-if="active">{{ page }}</b>
                      <b v-else>{{ page }}</b>
                      <router-link :to="{path: '/notifies/list?page=' + page, params: {page: page}}" class="page-link">{{ page }}</router-link>
                  </template>
              </b-pagination> -->
              <pagination-custom :current_page="currentPage" :per_page="perPage" :total_item="totalItem" :changePage="changePage" :items="items"></pagination-custom>
              <modal-users-sent :list_user="listUser"></modal-users-sent>
          </div>
        </div>
      </div> 
    </div>
  </div>
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
    mounted() {

      // var self = this;
      // var id = self.$route.params.id;
      // axios.get(this.$_apiUrl + 'admin/notifies/list')
      //     .then(function(res) {
      //         var notifies = res.data;
      //         self.items = notifies.data;
      //         self.currentPage = notifies.current_page;
      //         self.totalItem = notifies.total;
      //     })
      //     .catch(function(err) {
      //         if(err.response.status) {
      //             // alert(err.response.data.message);
      //             self.$router.push('/dashboard');
      //         } 
      //     });
      this.changePage();
    },
    data: function() {
      return {
        items: [],
        totalItem: 10,
        currentPage: 1,
        perPage: 3,
        linkItem: '/notifies/',
        listUser: []
      }
    },
    methods: {
      changePage() {
        var self = this;
        var page = self.$route.query.page ? self.$route.query.page : self.currentPage;
        axios.get(this.$_apiUrl + 'admin/notifies/list', {
              params: {
                  page: page
              }
          })
          .then(function(res) {
              var notifies = res.data;
              self.items = notifies.data;
              self.totalItem = notifies.total;
              self.currentPage = notifies.current_page;
              console.log(self.items);
          })
          .catch(function(err) {
              if(err.response.status) {
                  // alert(err.response.data.message);
                  self.$router.push('/dashboard');
              } 
          });
      },
      getListUsersSent(notifyId) {
        var self = this;
        axios.get(this.$_apiUrl + 'admin/notifies/users/list', {
              params: {
                  notify_id: notifyId
              }
          })
          .then(function(res) {
              var users = res.data.users_read;
              self.listUser = users;
              console.log(users);
          })
          .catch(function(err) {
              if(err.response.status) {
                  // alert(err.response.data.message);
                  self.$router.push('/dashboard');
              } 
          });
      }
    },
    computed: {

    }
  }
</script>
