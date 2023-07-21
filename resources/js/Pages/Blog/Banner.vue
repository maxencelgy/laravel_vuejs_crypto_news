<template>
  <h2 class="pt-12 wrap mb-16 text-4xl font-bold leading-none tracking-tight text-white underline underline-offset-3 decoration-8  decoration-yellowFirst-600" style="margin-bottom: 2rem">
    Sélection de la semaine</h2>
  <div class=" wrap flex  justify-between py-10 pb-16 box-card">
    <CardPricipale
      width="width: 39%;"
      cardClass="custom-card"
      :imageSrc="`${filteredOneItems[0].image}`"
      imageAlt=""
      :date="`${filteredOneItems[0].created_at}`"
      :username="getUserName(filteredOneItems[0].user_id)"
      :title="filteredOneItems[0].title"
      :description="filteredOneItems[0].content"
      :link="`/guides/${filteredOneItems[0].id}`"
      buttonText="Lire la suite"
    />
    <div class="flex flex-col  items-left justify-between gap-4 box-right" style="width: 59%">
      <Link v-for="article in filteredItems" :href="`/guides/${article.id}`"
            class="flex flex-col  rounded-lg shadow w-full  md:flex-row  border-gray-700 bg-purple-600 hover:bg-purple-300">
        <img class="object-cover w-full rounded-t-lg  md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
             :src="`/img/${article.image}`" alt="">
        <div class="flex flex-col justify-between py-2">
          <div class="flex flex-col justify-between px-4 leading-normal">
            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 text-white">{{
                article.title
              }}</h5>
          </div>
          <div class="px-4 mb-4">
            <span class=" text-sm font-medium mr-2 px-2.5 py-0.5 rounded-full bg-purple-500 text-white">{{  getCategoryName(article.categoryId) }}</span>
          </div>
          <div class="flex justify-between px-4 items-center w-full">
            <div class="text-sm text-gray-400 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Zm7 6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z"/>
              </svg>
              <p class="ml-2"> {{ formatRelativeDate(article.created_at) }}</p>
            </div>
            <div class="flex text-gray-400 px-4 items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12Zm-8 8v-2.8q0-.85.438-1.563T5.6 14.55q1.55-.775 3.15-1.163T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20H4Z"/>
              </svg>
              <p class="ml-2 text-sm"> {{ getUserName(article.user_id) }} </p>
            </div>
          </div>
        </div>
      </Link>


    </div>
  </div>

</template>


<script>

import {Link} from "@inertiajs/inertia-vue3";
import CardPricipale from "@/Pages/Blog/CardPricipale.vue";
import dayjs from "dayjs";

export default {
  components: {CardPricipale, Link},
  props: {
    articlesOne: Object,
    users: Array,
    categories: Object,
  },
  methods: {
    formatRelativeDate(date) {
      const currentDate = dayjs();
      const articleDate = dayjs(date);
      const diffInMinutes = currentDate.diff(articleDate, 'minute');

      if (diffInMinutes < 1) {
        return "à l'instant";
      } else if (diffInMinutes < 60) {
        return `il y a ${diffInMinutes} minute${diffInMinutes > 1 ? 's' : ''}`;
      } else if (diffInMinutes < 1440) {
        const diffInHours = Math.floor(diffInMinutes / 60);
        return `il y a ${diffInHours} heure${diffInHours > 1 ? 's' : ''}`;
      } else {
        const diffInDays = Math.floor(diffInMinutes / 1440);
        return `il y a ${diffInDays} jour${diffInDays > 1 ? 's' : ''}`;
      }
    },
    getUserName(userId) {
      const user = this.users.find((user) => user.id === userId);
      return user ? `${user.first_name} ${user.last_name}` : "";
    },
    getCategoryName(categoryId) {
      const category = this.categories.find((category) => category.id === categoryId);
      return category ? category.title : "";
    },
  },
  mounted() {
  },
  computed: {
    filteredItems: function () {
      return this.articlesOne.slice(1, 5)
    },
    filteredOneItems: function () {
      return this.articlesOne.slice(0, 5)

    }
  }
}

</script>
