<template>
  <Header>
    <List :categories="categories" :articles="articles" :users="users"></List>
  </Header>
</template>


<script>
// import { Head } from '@inertiajs/inertia-vue3'
import Header from '@/Shared/Header'
import List from "@/Pages/Blog/List.vue";

export default {
  components: {List},
  layout: Header,
  props: {
    categories: Object,
    articles: Object,
    users: Object,
  },
}


</script>
