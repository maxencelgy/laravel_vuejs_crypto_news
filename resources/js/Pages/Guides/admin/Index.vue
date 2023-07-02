<template>
  <div>
    <Head title="Guides" />
    <h1 class="mb-8 text-3xl font-bold">Guides</h1>
    <div class="flex items-center justify-between mb-6">
      <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset">
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="form-select mt-1 w-full">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <Link class="btn-indigo" href="/admin/guides/create">
        <span>Create</span>
        <span class="hidden md:inline">&nbsp;Guides</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <thead>
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">Title</th>
          <th class="pb-4 pt-6 px-6">Content</th>
          <th class="pb-4 pt-6 px-6">Image</th>
          <th class="pb-4 pt-6 px-6">Categorie</th>
          <th class="pb-4 pt-6 px-6"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="guide in guides.data" :key="guide.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/admin/guides/${guide.id}/edit`">
              {{ guide.title }}
              <icon v-if="guide.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link style=" display: inline-block;width: 50ex;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;vertical-align: middle;" class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/admin/guides/${guide.id}/edit`">
              {{ guide.content }}
              <icon v-if="guide.deleted_at" name="trash" class="flex-shrink-0 ml-2 w-3 h-3 fill-gray-400" />
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/admin/guides/${guide.id}/edit`" tabindex="-1">
              <img class="block -my-2 mr-2 w-8 h-8 rounded-full" :src="`/img/`+guide.image" alt="">
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="`/admin/guides/${guide.id}/edit`" tabindex="-1">
              <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">
              {{ guide.categorie }}
              </span>
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="`/admin/guides/${guide.id}/edit`" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="guides.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">No guides found.</td>
        </tr>
        </tbody>
      </table>
    </div>
    <pagination class="mt-6" :links="guides.links" />
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
  layout: Layout,
  props: {
    filters: Object,
    guides: Object,
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
        this.$inertia.get('/admin/guides', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
