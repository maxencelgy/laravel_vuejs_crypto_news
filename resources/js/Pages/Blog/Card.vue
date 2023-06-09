<template>
  <div style="width: 32.33%" class="mb-6  rounded-sm shadow-lg bg-purple-400">
    <a href="#">
      <img class="rounded-t-lg" src="https://picsum.photos/800/200" alt="" />
    </a>
    <div class="p-5">
      <a href="#">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 text-white">Noteworthy technology acquisitions 2021</h5>
      </a>
      <p class="mb-3 font-normal text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
      <a href="#" class="bg-purple-500 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg hover:bg-yellowFirst-700 focus:ring-4 focus:outline-none focus:ring-blue-300">
        Lire la suite
        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </a>
    </div>
  </div>
</template>


<script>

import {Link} from "@inertiajs/inertia-vue3";

export default {
  components: {Link},

}
</script>
