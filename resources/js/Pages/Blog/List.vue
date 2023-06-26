<template>
<div class="bg-purple-600 ">
  <div class="wrap flex items-center py-4 bg-purple-600 md:py-8 flex-wrap">
    <button type="button"
            class=" focus:ring-4 focus:outline-none rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 hover:bg-yellowFirst-700  text-white ">
      All categories
    </button>
    <button type="button" v-for="categorie in categories" class="border border-gray-900 hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium hover:bg-yellowFirst-700 px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 text-white focus:ring-gray-800">
      {{  categorie.title }}
    </button>

  </div>
  <div class="bg-purple-600">
    <div class="wrap flex pb-16 flex-wrap justify-between">
      <Card v-for="article in articles"
        :imageSrc="article.image"
        imageAlt=""
        :category="getCategoryName(article.categoryId)"
        :date="article.created_at"
        :username="getUserName(article.user_id)"
        :title="article.title"
        :description="article.description"
        :link=" `guides/` + article.id"
        buttonText="Lire la suite"
      />
    </div>
  </div>
</div>

</template>


<script>

import {Link} from "@inertiajs/inertia-vue3";
import Card from "./Card";
import * as url from "url";
export default {
  components: {Link, Card},


  props: {
    categories: Object,
    articles: Object,
    users: Object,
  },
  mounted() {
    console.table(this.articles)

  },
  methods: {
    getUserName(userId) {
      const user = this.users.find(user => user.id === userId);
      return user.first_name + ' ' + user.last_name;
    },
    getCategoryName(categoryId) {
      const category = this.categories.find(category => category.id === categoryId);
      return category.title;
    }
  },
}



</script>
