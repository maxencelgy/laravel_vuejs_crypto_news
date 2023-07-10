<template>
  <Corp>
    <div class="bg-purple-600">
      <div class="wrap flex justify-center pb-16">
        <div class="w-full pb-16">
          <div class="img" :style="{ backgroundImage:'url(/img/'+ article.image +')' }"></div>
          <div class="container mx-auto mt-8 ">
            <h1 class="text-5xl uppercase font-bold text-center text-white mb-4">{{ article.title }}</h1>
            <p class="text-gray-600">{{ article.description }}</p>
            <div class="mt-8 text-white text-2xl">
              <div v-html="article.content"></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </Corp>
</template>


<script>
// import { Head } from '@inertiajs/inertia-vue3'
import Header from '@/Shared/Corp.vue'
export default {
  components: {},
  layout: Header,
  props: {
    categories: Object,
    article: Object,
    users: Object,
  },

}


</script>
<style>
.img {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 400px;
}

.banner {
  height: 400px;
}
h2 {
  margin-top: 2.5rem;
  font-size: 2rem;
  font-weight: 600;
  line-height: 2rem;
  margin-bottom: 0.75rem;
}

ol {
  list-style: decimal!important;
}
ol li {
  margin-bottom: 0.5rem;
  list-style: decimal!important;
}

@media (max-width: 500px) {
  .text-5xl {
    font-size: 2rem;
  }
}

</style>
