<template>
  <div>
    <Head title="Guides" />
    <h1 class="mb-8 text-3xl font-bold">Catégories</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/admin/categories/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Categorie </span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Title</th>
          <th class="pb-4 pt-6 px-6"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="categorie in categories.data" :key="categorie.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/admin/categories/${categorie.id}/edit`">
              {{ categorie.title }}
              <icon v-if="categorie.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>

          <td class="w-px border-t">
            <button v-if="!categorie.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy(categorie.id)"><icon name="trash" class="mr-1 w-6 h-6 fill-red" /></button>

          </td>
        </tr>
        <tr v-if="categories.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No categories found.</td>
        </tr>
        </tbody>
      </table>
    </div>
    <pagination class="mt-6" :links="categories.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  mounted() {
    console.log(this.categories)
  },
  layout: Layout,
  props: {
    filters: Object,
    categories: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/admin/categories', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
    destroy(id) {
      if (confirm('Are you sure you want to delete this category ?')) {
        // console.log(`/admin/categories/${id}`)
        this.$inertia.delete(`/admin/categories/${id}`)
      }
    },
  },
}
</script>
