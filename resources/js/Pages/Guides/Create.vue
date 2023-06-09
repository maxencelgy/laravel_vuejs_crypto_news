<template>
  <Header>
    <div class="p-8 bg-darkblue-500">
      <Head title="Poster un article"/>
      <div class=" wrap flex justify-between items-start py-8">
        <div style="width: 48%" class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
          <form @submit.prevent="store">
            <div class="px-10 py-12">
              <h1 class="text-center text-3xl font-bold">Rédige un article</h1>
              <div class="m-4 mt-6 mx-auto w-24 border-b-2"/>
              <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                <file-input v-model="form.image" @change="handleFileChange" :error="form.errors.image"
                            class="pb-8 pr-6 w-full" type="file"
                            accept="image/*" label="Photo"/>

                <text-input v-model="form.title" :error="form.errors.title" class="pb-8 pr-6 w-full"
                            label="Titre"/>
                <br>

                <textarea-input v-model="form.content" :error="form.errors.content" class="pb-8 pr-6 w-full"
                                label="Contenu"/>

                <select-input v-model="form.categoryId" :error="form.errors.categoryId"
                              class="pb-8 pr-6 w-full"
                              label="Catégorie">
                  <option value=""> Sélectionnez une catégorie</option>
                  <option :value="`${item.id}`" v-for="item in categories">{{ item.title }}</option>
                </select-input>
              </div>
              <div class="px-8 py-4 bg-gray-50 border-t border-gray-100">
                <br>
                <loading-button :loading="form.processing" class="btn-indigo w-full" type="submit">Poster l'article
                </loading-button>
              </div>
            </div>
          </form>
        </div>
        <div style="width: 48%;">
          <div style="" class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div v-if="previewImage">
              <img :src="previewImage" height="200px" alt="Preview"/>
            </div>
            <div class="p-5">
              <a href="#">
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white uppercase">{{
                    form.title
                  }}</h5>
              </a>
              <span v-if="form.categoryId != ''"
                    class="px-3 py-2 mb-4 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">{{
                  categories.filter(item => {
                    return item.id == form.categoryId
                  })[0].title
                }}</span>
              <br>

              <p class=" py-2  mb-3 font-normal text-gray-700 dark:text-gray-400 max-w-8 truncate ">{{
                  form.content
                }}</p>
              <a href="#"
                 class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
          <br>
          <div class="rounded bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

            <img class="mb-4 rounded shadow-lg" height="50px" :src="previewImage"/>
            <div class="flex items-center justify-center">
              <h1 class="mb-4 text-center text-4xl mr-4 text-white uppercase font-bold">
                {{ form.title }}</h1>
              <span v-if="form.categoryId != ''"
                    class="mb-6 bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">{{
                  categories.filter(item => {
                    return item.id == form.categoryId
                  })[0].title
                }}</span>
            </div>

            <br>
            <p class="text-white p-4 text-lg no-truncate">
              {{ form.content }}
            </p>
          </div>

        </div>
      </div>

    </div>
  </Header>
</template>
<style>
.truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  max-width: 100%;
}

.no-truncate {
  overflow: hidden;
  overflow-wrap: break-word;
  max-width: 100%;
}
</style>
<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import Header from '@/Shared/Header'
import TextareaInput from "@/Shared/TextareaInput.vue";
import FileInput from "@/Shared/FileInput.vue";
import {toRaw} from "vue";

export default {
  components: {
    FileInput,
    TextareaInput,
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
  },
  layout: Header,
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        content: '',
        image: null,
        categoryId: '',
      }),
      previewImage: null,
    };
  },
  props: {
    categories: Object,
  },
  methods: {
    handleFileChange(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          this.previewImage = reader.result;
        };
        reader.readAsDataURL(file);
      } else {
        this.previewImage = null;
      }
    },
    store() {
      this.form.post('/guides')
    },
    truncateText(text, limit) {
      if (text.length <= limit) {
        return text;
      } else {
        return text.substr(0, limit) + '...';
      }
    },
  },
  mounted() {
    console.table(toRaw(this.categories));
  }
}
</script>
