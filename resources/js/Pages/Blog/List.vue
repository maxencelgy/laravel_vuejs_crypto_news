<template>
<div class="bg-purple-600 ">
  <h2 class="pt-12 wrap mb-8 text-4xl font-bold leading-none tracking-tight text-white underline underline-offset-3 decoration-8  decoration-yellowFirst-600 ">Actu des crypto-monnaies</h2>
  <div class="wrap flex items-center py-4 bg-purple-600 md:py-8 flex-wrap">
    <button type="button"
            class=" focus:ring-4 focus:outline-none rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 hover:bg-yellowFirst-700  text-white ">
      All categories
    </button>
    <button type="button"
            class="border border-gray-900 hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium hover:bg-yellowFirst-700 px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 text-white focus:ring-gray-800">
      Shoes
    </button>
    <button type="button"
            class="border border-gray-900 hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium hover:bg-yellowFirst-700 px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 text-white focus:ring-gray-800">
      Bags
    </button>
    <button type="button"
            class="border border-gray-900 hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium hover:bg-yellowFirst-700 px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 text-white focus:ring-gray-800">
      Electronics
    </button>
    <button type="button"
            class="border border-gray-900 hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium hover:bg-yellowFirst-700 px-5 py-2.5 text-center mr-3 mb-3 bg-purple-500 text-white focus:ring-gray-800">
      Gaming
    </button>
  </div>
  <div class="bg-purple-600">

    <div class="wrap flex flex-wrap justify-between">
      <Card/>
      <Card/>
      <Card/>
      <Card/>
      <Card/>
    </div>
  </div>
</div>

</template>


<script>

import {Link} from "@inertiajs/inertia-vue3";
import Card from "./Card";

export default {
  components: {Link, Card},
  props: {
    categories: Object,
  },
  mounted() {
    console.log(this.categories)
  }
}



</script>
