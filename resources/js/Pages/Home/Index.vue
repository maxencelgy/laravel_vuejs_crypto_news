<template>
  <Header>
    <section class="pt-16 bg-purple-600">
      <div class="wrap top-flex pt-20 bg-purple-600 flex items-top justify-between  ">
        <div class="h-full" style="width: 39%">
          <h1 class="mb-4 text-5xl font-extrabold leading-none tracking-tight text-gray-900 text-white">Explorez
            l'avenir de la finance avec notre blog dédié à la
            <span class="text-purple-500">crypto-monnaie</span></h1>
          <br>
          <p class="mb-8 font-normal text-gray-500 text-gray-400">Plongez dans l'univers fascinant de la
            crypto-monnaie et explorez les opportunités infinies de l'ère numérique avec notre blog dédié aux dernières
            tendances et analyses du monde des cryptos</p>
          <div class="flex gap-4 items-center">
            <Link href="#selection"
               class="transition-all uppercase font-semibold  inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center text-white bg-purple-500 rounded-lg hover:bg-yellowFirst-700 focus:ring-4 focus:ring-blue-300 focus:ring-blue-900 ">
              Découvrir
            </Link>
            <Link v-if="auth.user == null"
              class=" cursor-pointer transition-all uppercase font-semibold inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center  text-black bg-yellowFirst-600 rounded-lg hover:bg-yellowFirst-700 hover:text-white focus:ring-4 focus:ring-blue-300 focus:ring-blue-900"
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

    <div id="selection" class="bg-purple-400 w-full py-8">
      <Banner :categories="categories" :users="users" :articlesOne="articlesOne"/>
    </div>
    <div class="bg-purple-700" style="padding-top: 2rem">
      <h2
        class="pt-12 wrap mb-8 text-4xl font-bold leading-none tracking-tight text-white underline underline-offset-3 decoration-8  decoration-yellowFirst-600 ">
        Actu des crypto-monnaies</h2>
      <List :categories="categories" :articles="articles" :users="users" :likes="likes" :user="user"/>
      <div class="text-center ">
        <Link style="width: 15%" class="mb-8 transition-all uppercase font-semibold  inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center text-white bg-purple-500 rounded-lg hover:bg-yellowFirst-700 focus:ring-4 focus:ring-blue-300 focus:ring-blue-900  " :href="`/guides`"> Voir tous les articles</Link>
      </div>
    </div>

    <section class="bg-purple-400 pb-16">
      <div id="qui" class=" wrap w-full">
        <h2 class=" pt-12 wrap mb-8 text-4xl font-bold leading-none tracking-tight text-white underline underline-offset-3 decoration-8  decoration-yellowFirst-600 ">
          Cryptos à suivre
        </h2>

        <h3 class="mt-6 mb-6 text-xl text-white">Les prix en temps réel & les meilleures opportunités d'achat</h3>
          <div class="relative rounded-2xl border-purple-500 border overflow-x-auto shadow-md rounded-3xl">
            <table class="rounded-3xl w-full text-sm text-left text-white bg-purple-600">
              <tbody>
              <tr v-for="(crypto, index, number) in currencies" :key="index" class="text-xl">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap text-white">
                  <span class="text-gray-400">#{{index + 1}}</span>
                </th>
                <td class="px-6 py-4">
                  <img width="25" height="25" :src="crypto.icon" alt="">
                </td>
                <td class="px-6 py-4">
                  {{  crypto.name }}
                </td>
                <td class="px-6 py-4">
                  {{ Math.round(crypto.price * 100) / 100  }} €
                </td>
                <td class="px-6 py-4 text-right">
                  <span :class="crypto.priceChange1d > 0 ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800'" class=" px-2 inline-flex  leading-5 font-light rounded " >
                    {{ crypto.priceChange1d }} %
                  </span>
                </td>
              </tr>
              </tbody>
            </table>
        </div>

      </div>

    </section>

    <section class="bg-purple-600">
      <div class="wrap py-16 flex items-center justify-between">
        <div class="flex flex-col justify-center" style="width: 49%">
          <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Découvrez notre boutique en ligne dédiée aux cryptomonnaies !</h1>
          <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Notre boutique en ligne vous propose une gamme variée de produits, soigneusement sélectionnés, pour que vous puissiez afficher votre amour pour les cryptomonnaies et exprimer votre passion avec style</p>
          <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
            <a target="_blank" href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-purple-500">
              Découvrir la boutique
              <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
          </div>
        </div>

        <div>
          <div class=" relative  border-gray-800 dark:border-gray-800 bg-gray-800 border-[8px] rounded-t-xl h-[172px] max-w-[301px] md:h-[294px] md:max-w-[512px]">
            <div class="rounded-lg overflow-hidden h-[156px] md:h-[278px] bg-white dark:bg-gray-800">
              <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen.png" class="dark:hidden h-[156px] md:h-[278px] w-full rounded-xl" alt="">
              <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen-dark.png" class="hidden dark:block h-[156px] md:h-[278px] w-full rounded-lg" alt="">
            </div>
          </div>
          <div class="relative  bg-gray-900 dark:bg-gray-700 rounded-b-xl rounded-t-sm h-[17px] max-w-[451px] md:h-[21px] md:max-w-[597px]">
            <div class="absolute left-1/2 top-0 -translate-x-1/2 rounded-b-xl w-[56px] h-[5px] md:w-[96px] md:h-[8px] bg-gray-800"></div>
          </div>

        </div>
      </div>
    </section>


  </Header>
</template>


<script>
// import { Head } from '@inertiajs/inertia-vue3'
import Header from '@/Shared/Header'
import {Link} from "@inertiajs/inertia-vue3";
import List from "@/Pages/Blog/List.vue";
import Banner from "@/Pages/Blog/Banner.vue";

export default {


  data() {
    return {
      currencies: Object,
    }
  },

  mounted() {
    this.$nextTick(() => {
      const container = document.getElementById('container');
      container.style.display = 'none';
    });
    this.fetchCurrencies();
  },
  methods: {
    async fetchCurrencies() {
      const response = await fetch('https://api.coinstats.app/public/v1/coins?skip=0&limit=5&currency=EUR');

      //Prendre les 5 premières crypto-monnaies de la liste


      response.json().then(data =>
        this.currencies = data.coins,
      );
    },
  },
  computed: {
    // filteredCurrencies: function () {
    //
    //   return Array.prototype.slice.call(my_object, 4);
    // },
  },
  onMounted() {
    console.log(this.currencies)
  },
  components: {Banner, Link, List},
  props: {
    auth: Object,
    categories: Object,
    articles: Object,
    users: Object,
    user: Object,
    likes: Object,
    articlesOne: Object,
  },

  layout: Header,
}
</script>

