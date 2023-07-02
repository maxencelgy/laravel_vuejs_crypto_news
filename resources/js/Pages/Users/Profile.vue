<template>
  <Header>
    <div class="flex flex-col items-center min-h-screen bg-purple-400">
      <div class="w-full h-48 bg-cover bg-center bg-purple-500"></div>
      <div class="w-52 h-52 mt-[-64px] rounded-full overflow-hidden border-4 border-white shadow-lg">
        <img class="object-cover w-full h-full" v-if="user.photo" :src="user.photo" alt="Profile Image">
        <img class="object-cover w-full h-full" v-else src="/images/defaut.jpg" alt="Default Image">
      </div>
      <div class="mt-8 text-center">
        <h1 class="text-2xl text-white font-bold"> {{ user.first_name }} {{ user.last_name }}</h1>
        <p class="text-lg text-gray-400 mb-4">Utilisateur depuis : {{ new Date(user.created_at).toLocaleDateString() }}</p>
        <Link :href="`profil/${user.id}/edit`" class="focus:outline-none text-white focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-lg px-5 py-2.5 mb-2 bg-purple-500 hover:bg-yellowFirst-700 transition-all focus:ring-purple-900 uppercase">Modifier mes informations </Link>
      </div>
      <br>
      <br>
      <br>
      <div class="wrap">
        <h2 class="text-left text-2xl uppercase font-bold text-white mb-4 flex gap-4">Articles likés <svg width="28" height="30" viewBox="0 0 256 256"><path fill="currentColor" d="M178 28c-20.09 0-37.92 7.93-50 21.56C115.92 35.93 98.09 28 78 28a66.08 66.08 0 0 0-66 66c0 72.34 105.81 130.14 110.31 132.57a12 12 0 0 0 11.38 0C138.19 224.14 244 166.34 244 94a66.08 66.08 0 0 0-66-66Zm-5.49 142.36a328.69 328.69 0 0 1-44.51 31.8a328.69 328.69 0 0 1-44.51-31.8C61.82 151.77 36 123.42 36 94a42 42 0 0 1 42-42c17.8 0 32.7 9.4 38.89 24.54a12 12 0 0 0 22.22 0C145.3 61.4 160.2 52 178 52a42 42 0 0 1 42 42c0 29.42-25.82 57.77-47.49 76.36Z"/></svg></h2>
        <div class="flex items-center justify-between" style="overflow: auto; max-width: 100%;">

          <div class="gap-4 flex">
            <Card v-for="article in articles"
                  :imageSrc="article.image"
                  imageAlt=""
                  :category="getCategoryName(article.categoryId)"
                  :date="article.created_at"
                  :username="getUserName(article.user_id)"
                  :title="article.title"
                  :description="article.description"
                  :link=" `guides/` + article.id"
                  :liked="getLike(article.id)"
                  buttonText="Lire la suite"
            />
          </div>
        </div>
      </div>

    </div>

    <section class="bg-purple-600 p-16">
azdaz
    </section>




  </Header>
</template>


<script>
import {Link} from '@inertiajs/inertia-vue3'
import Header from '@/Shared/Header'
import Card from "@/Pages/Blog/Card.vue";

export default {
  components: {
    Card,
    Link,
  },
  layout: Header,
  remember: 'form',
  props: {
    articles: Object,
    categories:Object,
    user: Object,
    likes: Object,
    users: Object
  },
  data() {
    return {
      form: this.$inertia.form({
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        owner: false,
        photo: null,
      }),
    }
  },
  methods: {
    getCategoryName(categoryId) {
      const category = this.categories.find(category => category.id === categoryId);
      return category.title;
    },
    getUserName(userId) {
      const user = this.users.find(user => user.id === userId);
      return user.first_name + ' ' + user.last_name;
    },

    getLike(guideId){
      const like = this.likes.find(like => like.guideId === guideId && like.userId === this.user.id);

      if (like){
        return true;
      }else {
        return false;
      }
    },

  },
  mounted() {
    // console.log(this.methods.getLike())
    // console.table(toRaw(this.user));
  },
}

</script>


