<template>
  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item" :class="{'disabled': current_page == 1}">
        <router-link :to="{path: '/notifies/list?page=' + (current_page - 1)}" class="page-link" v-on:click.native="changePage(current_page - 1)">Previous</router-link>
      </li>

      <li class="page-item" v-for="(page, index) in totalPage" :class="{'active': page == current_page}">
        <router-link :to="{path: '/notifies/list?page=' + page}" class="page-link" v-on:click.native="changePage(page)">{{ page }}</router-link>
      </li>

      <li class="page-item" :class="{'disabled': current_page == totalPage}">
        <router-link :to="{path: '/notifies/list?page=' + (current_page + 1)}" class="page-link" v-on:click.native="changePage(current_page - 1)">Next</router-link>
      </li>
    </ul>
  </nav>
</template>
<script>
export default {
  mounted() {

  },
  data: function() {
    return {
      total_page: 1
    }
  },
  props: [
    'current_page', 
    'total_item', 
    'per_page',
    'changePage',
    'items'
  ],
  computed: {
    totalPage() {
      return Math.round(this.total_item/this.per_page);
    }
  },
  methods: {
    // changePage: () => {
    //   console.log("cascacacc");
    // }
  }
}
</script>