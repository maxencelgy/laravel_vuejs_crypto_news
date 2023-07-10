<template>
  <div :style="width " style="word-wrap: break-word" class="image-container shadow-lg hove rounded-lg shadow bg-purple-600 hover:bg-purple-300">
    <a :href="link">
      <div class="imgPrincipal" :style="{ backgroundImage:'url(/img/'+ imageSrc +')' }"></div>

    </a>
    <div class="flex justify-between px-4 items-center w-full">
      <div class="text-sm text-gray-400 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Zm7 6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z"/>
        </svg>
        <p class="ml-2">{{ formatRelativeDate(date)  }}</p>
      </div>
      <div class="flex text-gray-400 px-4 items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
          <path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12Zm-8 8v-2.8q0-.85.438-1.563T5.6 14.55q1.55-.775 3.15-1.163T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20H4Z"/>
        </svg>
        <p class="ml-2 text-sm">{{ username }}</p>
      </div>
    </div>
    <div class="pt-2 pb-5 pl-5 pr-5">
      <a :href="link">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">{{ title }}</h5>
      </a>
      <p class="mb-3 font-normal text-gray-400 no-truncate"> {{ tronquerTexte(description, 300  ) }}</p>
      <a :href="link"
         class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-purple-500 hover:bg-yellowFirst-700 transition-all">
        {{ buttonText }}
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
      </a>
    </div>
  </div>
</template>

<script>
import dayjs from "dayjs";

export default {
  name: 'CardPrincipale',
  methods: {
    tronquerTexte(texte, longueurMax) {
      const div = document.createElement('div');
      div.innerHTML = texte;

      let texteTronque = div.textContent || div.innerText;
      if (texteTronque.length > longueurMax) {
        texteTronque = texteTronque.substring(0, longueurMax) + '...';
      }

      return texteTronque;
    },
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
  },
  props: {
    cardClass: {
      type: String,
      default: 'shadow-lg hove rounded-lg shadow bg-purple-600 hover:bg-purple-300',
    },
    imageSrc: {
      type: String,
      default: 'https://picsum.photos/1100/463',
    },
    imageAlt: {
      type: String,
      default: '',
    },
    date: {
      type: String,
      default: '',
    },
    username: {
      type: String,
      default: '',
    },
    width: {
      type: String,
      default: 'width: 100%;',
    },
    title: {
      type: String,
      default: '',
    },
    description: {
      type: String,
      default: '',
    },
    link: {
      type: String,
      default: '#',
    },
    buttonText: {
      type: String,
      default: 'Lire la suite',
    },
  },
}
</script>

<style>

.no-truncate {
  overflow: hidden;
  overflow-wrap: break-word;
  max-width: 100%;

}
.imgPrincipal {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 280px;
  border-top-left-radius: .5rem;
  border-top-right-radius: .5rem;
  margin-bottom: 1rem;
}
</style>
