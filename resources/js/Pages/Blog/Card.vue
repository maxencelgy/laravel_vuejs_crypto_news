<template>
  <div style="width: 31.83%; word-wrap: break-word" class="card-all hover:opacity-70 mb-12 transition-all">
    <div class="relative">
      <svg v-if="liked == false" @click="handleSvgClick" width="28" height="30" viewBox="0 0 256 256" style="top: 15; right: 18;" class="absolute text-white"><path fill="red" d="M178 28c-20.09 0-37.92 7.93-50 21.56C115.92 35.93 98.09 28 78 28a66.08 66.08 0 0 0-66 66c0 72.34 105.81 130.14 110.31 132.57a12 12 0 0 0 11.38 0C138.19 224.14 244 166.34 244 94a66.08 66.08 0 0 0-66-66Zm-5.49 142.36a328.69 328.69 0 0 1-44.51 31.8a328.69 328.69 0 0 1-44.51-31.8C61.82 151.77 36 123.42 36 94a42 42 0 0 1 42-42c17.8 0 32.7 9.4 38.89 24.54a12 12 0 0 0 22.22 0C145.3 61.4 160.2 52 178 52a42 42 0 0 1 42 42c0 29.42-25.82 57.77-47.49 76.36Z"/></svg>
      <svg v-else @click="handleSvgClick" class="absolute text-white z-40" xmlns="http://www.w3.org/2000/svg" width="30" height="32" style="top: 15; right: 18;" viewBox="0 0 24 24"><path fill="red" d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.388 2.25t-1.362 2.412q-.975 1.313-2.625 2.963T13.45 19.7L12 21Z"/></svg>
    </div>

    <Link :href="link" class=" cursor-pointer" >
<!--      <img class="rounded-2xl mb-4 h-72 w-full" :src="'/img/' + imageSrc" :alt="imageAlt">-->
      <div class="img" :style="{ backgroundImage:'url(/img/'+ imageSrc +')' }"></div>

      <h2 class="text-3xl mb-2 font-bold tracking-tight text-white">{{ title }} </h2>
      <span
        class="mt-2 text-base font-medium mr-2 px-2.5 py-0.5 rounded-full bg-purple-500 text-white">{{
          category}}</span>
      <div class="mt-4 flex justify-between items-center w-full">
        <div class="text-sm text-gray-400 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Zm7 6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z"/>
          </svg>
          <p class="ml-2">{{ formatRelativeDate(date) }}</p>
        </div>
        <div class="flex text-gray-400 px-4 items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12Zm-8 8v-2.8q0-.85.438-1.563T5.6 14.55q1.55-.775 3.15-1.163T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20H4Z"/>
          </svg>
          <p class="ml-2 text-sm">{{ username }}</p>
        </div>
      </div>
    </Link>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import dayjs from 'dayjs';
import 'dayjs/locale/fr'; // Importe également le module de localisation français

dayjs.locale('fr'); // Définit la locale sur français

export default {
  components: { Link },
  props: {
    auth: {
      type: Object,
    },
    category: {
      type: String,
      default: '',
    },
    cardClass: {
      type: String,
      default: 'shadow-lg hove rounded-lg shadow bg-purple-600 hover:bg-purple-300',
    },
    imageSrc: {
      type: String,
      default: '',
    },
    imageAlt: {
      type: String,
      default: '',
    },
    date: {
      type: String,
      default: '',
    },
    title: {
      type: String,
      default: '',
    },
    username: {
      type: String,
      default: '',
    },
    link: {
      type: String,
      default: '',
    },
    liked: {
      type: String,
      default: '',
    },
    guide_id: {
      type: String,
      default: '',
    },
    user_id: {
      type: String,
      default: '',
    },
  },
  mounted() {
    // console.log(this.user_id)
  },
  data() {
    return {
      form: this.$inertia.form({
        userId: this.user_id,
        guideId: this.guide_id,
      }),
    }
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
    handleSvgClick(){
      this.form.post('/like')
    }


  },
};
</script>
<style>
.img {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 280px!important;
  border-radius: .8rem;
  margin-bottom: 1rem;
}
</style>
