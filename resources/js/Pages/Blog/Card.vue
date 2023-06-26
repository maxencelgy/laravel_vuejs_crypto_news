<template>
  <div style="width: 31.83%" class="hover:opacity-70 mb-12 transition-all">
    <a :href="link">
      <img class="rounded-2xl mb-4 h-72 w-full" :src="'/img/' + imageSrc" :alt="imageAlt">
      <h2 class="text-3xl mb-2 font-bold tracking-tight text-white">{{ title }}</h2>
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
    </a>
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
  },

  methods: {
    formatRelativeDate(date) {
      const currentDate = dayjs();
      const articleDate = dayjs(date);
      const diffInMinutes = currentDate.diff(articleDate, 'minute');

      if (diffInMinutes < 1) {
        return "à l'instant";
      } else if (diffInMinutes < 60) {
        return `il y a ${diffInMinutes} minutes`;
      } else {
        const diffInHours = Math.floor(diffInMinutes / 60);
        return `il y a ${diffInHours} heure${diffInHours > 1 ? 's' : ''}`;
      }
    }

  },
};
</script>
