<template>
  <Header>
    <section class="pt-16 bg-purple-600">
      <div class="wrap pt-20 bg-purple-600 flex items-top justify-between  ">
        <div class="h-full" style="width: 39%">
          <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 dark:text-white">Explorez
            l'avenir de la finance avec notre blog dédié à la
            <span class="text-purple-500">crypto-monnaie</span></h1>
          <br>
          <p class="mb-8 font-normal text-gray-500 dark:text-gray-400">Plongez dans l'univers fascinant de la
            crypto-monnaie et explorez les opportunités infinies de l'ère numérique avec notre blog dédié aux dernières
            tendances et analyses du monde des cryptos</p>
          <div class="flex gap-4 items-center">
            <a href="#selection"
               class="transition-all uppercase font-semibold  inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center text-white bg-purple-500 rounded-lg hover:bg-yellowFirst-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900 ">
              Découvrir
            </a>
            <Link v-if="auth.user == null"
              class=" cursor-pointer transition-all uppercase font-semibold inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center  text-black bg-yellowFirst-600 rounded-lg hover:bg-yellowFirst-700 hover:text-white focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900"
              :href="`/login`">
              S'inscrire / Se connecter
            </Link>

          </div>
        </div>
        <div class="" style="height: 480px; width: 59%">
          <iframe width="100%" style="" height="100%"
                  ref="myIframe" src="https://lottie.host/?file=7a3d551d-e4f0-41ca-9818-3685310a9f37/mY57uLicd9.json"></iframe>
        </div>
      </div>
    </section>

    <div id="selection" class="bg-purple-400 w-full">
      <Banner/>
    </div>
    <div class="bg-purple-700">
      <h2
        class="pt-12 wrap mb-8 text-4xl font-bold leading-none tracking-tight text-white underline underline-offset-3 decoration-8  decoration-yellowFirst-600 ">
        Actu des crypto-monnaies</h2>
      <List :categories="categories" :articles="articles" :users="users" :likes="likes" :user="user"/>
      <div class="text-center ">
        <Link style="width: 15%" class="mb-8 transition-all uppercase font-semibold  inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center text-white bg-purple-500 rounded-lg hover:bg-yellowFirst-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900  " :href="`/guides`"> Voir tous les articles</Link>
      </div>
    </div>


  </Header>
</template>


<script>
// import { Head } from '@inertiajs/inertia-vue3'
import Header from '@/Shared/Header'
import {Link} from "@inertiajs/inertia-vue3";
import List from "@/Pages/Blog/List.vue";
import Banner from "@/Pages/Blog/Banner.vue";

export default {
  mounted() {
    this.$nextTick(() => {
      const container = document.getElementById('container');
      container.style.display = 'none';
    });


  },
  components: {Banner, Link, List},
  props: {
    auth: Object,
    categories: Object,
    articles: Object,
    users: Object,
    user: Object,
    likes: Object,
  },
  layout: Header,
}
</script>

