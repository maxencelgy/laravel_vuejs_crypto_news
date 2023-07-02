<template>
  <Header>
    <List :categories="categories" :articles="articles" :users="users" :user="user" :likes="likes"></List>
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
    user: Object,
    likes: Object,
    categories: Object,
    articles: Object,
    users: Object,
  },
}


</script>
