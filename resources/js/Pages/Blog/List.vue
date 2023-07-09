<template>
  <div class="bg-purple-600">
    <div class="wrap">
      <div class=" search flex items-center  bg-purple-600 md:py-8 " style=" overflow: auto">
        <!-- Boutons de filtrage -->

        <!-- Barre de recherche -->
        <input
          type="text"
          v-model="searchQuery"
          @input="searchByQuery"
          placeholder="Search..."
          class="border border-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 text-white focus:ring-gray-800"
        />
        <button
          type="button"
          style="min-inline-size: 200px;" class="inline focus:ring-4 focus:outline-none rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 hover:bg-yellowFirst-700 text-white"
          @click="filterByCategory(null)"
        >
          Toutes les catégories
        </button>
        <button
          type="button"
          style="min-inline-size: 200px;"
          v-for="categorie in categories"
          :key="categorie.id" class="inline focus:ring-4 focus:outline-none rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 hover:bg-yellowFirst-700 text-white"
          @click="filterByCategory(categorie.id)"
        >
          {{ categorie.title }}
        </button>
      </div>
    </div>

    <br>
    <br>
    <!-- Contenu de la liste -->
    <div class="wrap flex pb-4 flex-wrap justify-between" style="min-height: 500px">
      <Card v-if="user"
        v-for="article in filteredArticles"
        :key="article.id"
        :guide_id="article.id"
        :imageSrc="article.image"
        imageAlt=""
        :category="getCategoryName(article.categoryId)"
        :date="article.created_at"
        :username="getUserName(article.user_id)"
        :title="article.title"
        :description="article.description"
        :link="`/guides/` + article.id"
        :liked="getLike(article.id)"
        :user_id="user.id"
        buttonText="Lire la suite"
      />
      <Card v-else
            v-for="article in filteredArticles"
            :key="article.id"
            :guide_id="article.id"
            :imageSrc="article.image"
            imageAlt=""
            :category="getCategoryName(article.categoryId)"
            :date="article.created_at"
            :username="getUserName(article.user_id)"
            :title="article.title"
            :description="article.description"
            :link="`guides/` + article.id"

            buttonText="Lire la suite"
      />
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Card from "./Card";

export default {
  components: { Link, Card },

  props: {
    categories: Array,
    articles: Array,
    users: Array,
    user: Object,
    likes: Array,
  },

  data() {
    return {
      selectedCategory: null,
      searchQuery: "",
    };
  },

  methods: {
    getUserName(userId) {
      const user = this.users.find((user) => user.id === userId);
      return user ? `${user.first_name} ${user.last_name}` : "";
    },
    getCategoryName(categoryId) {
      const category = this.categories.find((category) => category.id === categoryId);
      return category ? category.title : "";
    },
    getLike(guideId) {
      return this.likes.some((like) => like.guideId === guideId && like.userId === this.user.id);
    },
    filterByCategory(categoryId) {
      this.selectedCategory = categoryId;
    },
    searchByQuery() {
      // Do nothing here
      // The computed property "filteredArticles" will handle the filtering
    },
  },

  computed: {
    filteredArticles() {
      let filtered = this.articles;

      if (this.selectedCategory) {
        filtered = filtered.filter((article) => article.categoryId === this.selectedCategory);
      }

      if (this.searchQuery) {
        const query = this.searchQuery.toLowerCase();
        filtered = filtered.filter((article) =>
          article.title.toLowerCase().includes(query)
        );
      }

      return filtered;
    },
  },
};
</script>

<style scoped>
/* Ajoutez ici vos styles spécifiques pour le responsive */
@media (max-width: 808px) {
  .search {
    margin-bottom: 2rem;
    padding-top: 2rem;
  }

}
</style>
