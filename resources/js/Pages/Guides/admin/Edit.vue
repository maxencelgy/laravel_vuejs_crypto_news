<template>
  <div>
    <Head :title="form.title"/>
    <h1 class="mb-8 text-3xl font-bold">
      <Link class="text-indigo-400 hover:text-indigo-600" href="/admin/guides">Guides</Link>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.title }}
    </h1>
    <trashed-message v-if="guide.deleted_at" class="mb-6" @restore="restore"> This guide has been deleted.
    </trashed-message>
    <div class=" bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class=" flex-wrap -mb-8 -mr-6 p-8">
          <text-input v-model="form.title" :error="form.errors.title" class=" pb-8 pr-6 w-full w-full>"
                      label="Titre"/>
          <div class="flex items-center justify-between">
            <CkeditorInput @content-change="handleValueChange" :text="form.content"   style="width: 98%"></CkeditorInput>
            <text-input class="hidden" v-model="form.content" :model-value="this.content"></text-input>

          </div>
          <br>
          <div>
            <text-input class="hidden" v-model="form.content" :model-value="form.content"></text-input>
            <text-input class="hidden" v-model="form.user_id" :model-value="form.user_id"></text-input>
            <div class="flex flex-col ">
              <img :src="`/img/${form.image}`" class="text-center rounded-xl " style="width: 500px">
              <br>
              <file-input v-model="form.image" @change="handleFileChange" :error="form.errors.image"
                          class="pb-8 !text-gray-400 pr-6 w-full" type="file"
                          accept="image/*" label="Photo"/>
            </div>

            <select-input style="color: black!important;" v-model="form.categoryId" :error="form.errors.category"
                          class="pb-8 !text-gray-400 pr-6"
                          label="Catégorie">
              <option value="" style="color: black!important;"> Sélectionnez une catégorie</option>
              <option style="color: black!important;" :value="`${item.id}`" v-for="item in categories" :key="item.id">{{ item.title }}</option>
            </select-input>
            <label class="relative inline-flex items-center mb-5 cursor-pointer">
              <input name="online" :value="form.online" v-model="form.online" type="checkbox"
                     class="sr-only peer">
              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 peer-focus:ring-blue-800 rounded-full peer bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all border-gray-600 peer-checked:bg-blue-600"></div>
              <span class="ml-3 text-sm font-medium text-gray-900 text-gray-300">Mettre en ligne</span>
            </label>
            <br>
            <br>
            <br>
          </div>
          <button v-if="!guide.deleted_at" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900" tabindex="-1" type="button"
                  @click="destroy">Delete Guide
          </button>
          <br>

        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">

          <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">Update Guide
          </loading-button>
        </div>
      </form>
    </div>

  </div>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'
import CkeditorInput from "@/Shared/CkeditorInput.vue";
import FileInput from "@/Shared/FileInput.vue";


export default {
  components: {
    FileInput,
    CkeditorInput,
    Head,
    Icon,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Layout,
  props: {
    guide: Object,
    categories: Object
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: this.guide.title,
        content: this.guide.content,
        image: this.guide.image,
        categoryId: this.guide.categoryId,
        user_id: this.guide.user_id,
        online: this.guide.online,
      }),
    }
  },
  methods: {
    handleValueChange(value) {
      this.form.content = value;
    },
    update() {
      this.form.put(`/admin/guides/${this.guide.id}`)
    },
    copyText() {
    },
    destroy() {
      if (confirm('Are you sure you want to delete this guide?')) {
        this.$inertia.delete(`/admin/guides/${this.guide.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this guide?')) {
        this.$inertia.put(`/admin/guides/${this.guide.id}/restore`)
      }
    },
  },
  computed: {
    // filteredCategories() {
    //   return this.categories.filter(item=>item.id== this.form.categoryId)
    // }
  },
  mounted() {
    // console.log(this.form.image);
  }
}
</script>
<style >
label {
  color: black !important;
}

input {
  background-color: white !important;
  color: black !important;
}

select {
  background-color: white !important;
}

.form-input {
  background-color: white !important;
}

</style>
