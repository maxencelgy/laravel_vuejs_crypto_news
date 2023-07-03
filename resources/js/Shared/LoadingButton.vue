<template>
  <button :disabled="loading" class="mb-8 transition-all uppercase font-semibold  inline-flex w-full items-center justify-center px-5 py-3 text-base  text-center text-white bg-purple-500 rounded-lg hover:bg-yellowFirst-700 focus:ring-4 focus:ring-blue-300 focus:ring-blue-900   flex items-center justify-center">
    <div v-if="loading" class="btn-spinner mr-2" />
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
  },
}
</script>
