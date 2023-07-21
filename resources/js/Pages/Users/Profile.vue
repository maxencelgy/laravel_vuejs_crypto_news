<template>
  <Div>
    <div class="flex flex-col items-center min-h-screen bg-purple-600">
      <div class="w-full h-48 bg-cover bg-center bg-purple-500"></div>
      <div class="w-52 h-52 mt-[-64px] rounded-full overflow-hidden border-4 border-white shadow-lg">
        <img class="object-cover w-full h-full" v-if="user.photo" :src="'/img/' + user.photo_path" alt="Profile Image">
        <img class="object-cover w-full h-full" v-else src="/images/defaut.jpg" alt="Default Image">
      </div>
      <div class="mt-8 text-center">
        <h1 class="text-2xl text-white font-bold"> {{ user.first_name }} {{ user.last_name }}</h1>
        <p class="text-lg text-gray-400 mb-4">Utilisateur depuis : {{ new Date(user.created_at).toLocaleDateString() }}</p>
        <Link :href="`profil/edit`" class="focus:outline-none text-white focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-lg px-5 py-2.5 mb-2 bg-purple-500 hover:bg-yellowFirst-700 transition-all focus:ring-purple-900 uppercase">Modifier mes informations </Link>
      </div>
      <br>
      <br>
      <br>

      <div class="wrap">
        <h2 class="text-left text-2xl mb-6 uppercase font-bold text-white mb-4 flex gap-4">Articles likés :     <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="32" style="top: 15; right: 18;" viewBox="0 0 24 24"><path fill="red" d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.388 2.25t-1.362 2.412q-.975 1.313-2.625 2.963T13.45 19.7L12 21Z"/></svg>
        </h2>

        <div class="flex flex-wrap justify-between pb-16">
            <Card style="width: 31.33%; padding: 0!important;" v-if="articles" class="mr-6" v-for="article in articles"
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





  </Div>
</template>


<script>
import {Link} from '@inertiajs/inertia-vue3'
import Div from '@/Shared/Corp.vue'
import Card from "@/Pages/Blog/Card.vue";

export default {
  components: {
    Card,
    Link,
  },
  layout: Div,
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


<style>
@media (max-width: 1320px) {
  .card-all {
    width: 48%!important;
  }
  .mr-6 {
    margin-right: 0!important;
  }

}

@media (max-width: 770px) {
  .card-all {
    width: 98%!important;
  }


}
</style>
