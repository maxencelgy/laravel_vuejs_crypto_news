<template>
  <Div>
    <div class="p-8 bg-purple-400">
      <Head title="Poster un article"/>
      <div class=" wrap flex justify-between items-start py-8 box-contente">
        <div style="width: 48%" class="rounded border !text-gray-400 rounded-lg shadow bg-purple-600 border-gray-700">
          <form @submit.prevent="store">
            <div class="px-10 py-12">
              <h1 class="text-center text-3xl !text-gray-200 font-extrabold">Rédige un article</h1>
              <div class="m-4 mt-6 mx-auto border-yellowFirst-600 w-24 border-b-2"/>
              <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                <file-input v-model="form.image" @change="handleFileChange" :error="form.errors.image"
                            class="pb-8 !text-gray-400 pr-6 w-full" type="file"
                            accept="image/*" label="Photo"/>

                <text-input v-model="form.title" :error="form.errors.title" class="pb-8 !text-gray-400 pr-6 w-full"
                            label="Titre"/>
                <text-input v-model="form.user_id" :error="form.errors.title" class="hidden pb-8 pr-6 w-full"
                            label="id"/>
                <br>

                <select-input v-model="form.categoryId" :error="form.errors.categoryId"
                              class="pb-8 !text-gray-400 pr-6 w-full"
                              label="Catégorie">
                  <option value=""> Sélectionnez une catégorie</option>
                  <option :value="`${item.id}`" v-for="item in categories">{{ item.title }}</option>
                </select-input>

                <br>

                <CkeditorInput @content-change="handleValueChange" style="width: 95%!important;"></CkeditorInput>
                <text-input class="hidden" v-model="form.content" :model-value="this.content"></text-input>

                <!--                <text-input v-model="form.content" :model-value="this" :error="form.errors.content" class="hidden pb-8 pr-6 w-full" />-->

                <!--                <textarea-input v-model="form.content" :error="form.errors.content" class="pb-8 !text-gray-400 pr-6 w-full"-->
                <!--                                label="Contenu"/>-->

              </div>

              <div class="px-8 py-4 border-gray-100">
                <loading-button :loading="form.processing" class="transition-all btn-indigo bg-purple-500 w-full"
                                type="submit">Poster l'article
                </loading-button>
              </div>
            </div>
          </form>
        </div>
        <div style="width: 48%; word-wrap: break-word;">



          <img :style="{ backgroundImage:'url('+previewImage +')' }" class="img" style="" alt="">
          <h1 class="text-5xl uppercase font-bold text-center text-white mb-4">{{ form.title }}</h1>
          <div v-html="form.content" class="mt-8 text-white text-2xl"></div>


          <!--          <CardPricipale-->
          <!--            width="width: 100%;"-->
          <!--            :cardClass="custom-card"-->
          <!--            :imageSrc="previewImage"-->
          <!--            imageAlt=""-->
          <!--            date="À l'instant"-->
          <!--            :username="user.first_name + ' ' + user.last_name"-->
          <!--            :title="form.title"-->
          <!--            :description="`content`"-->
          <!--            link="#"-->
          <!--            buttonText="Lire la suite"-->
          <!--          />-->

        </div>
      </div>

    </div>
  </Div>
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
import {Head} from '@inertiajs/inertia-vue3'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import Div from '@/Shared/Corp.vue'
import FileInput from "@/Shared/FileInput.vue";
import CardPricipale from "@/Pages/Blog/CardPricipale.vue";
import CkeditorInput from "@/Shared/CkeditorInput.vue";
import Card from "@/Pages/Blog/Card.vue";


export default {
  components: {
    Card,
    CkeditorInput,
    FileInput,
    CardPricipale,
    Head,
    LoadingButton,
    SelectInput,
    TextInput,
  },
  layout: Div,
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        title: '',
        user_id: this.user.id,
        content: '',
        image: null,
        role: '',
        categoryId: '',
        online: 0,
      }),
      previewImage: null,
    };
  },
  props: {
    categories: Object,
    user: Object,
  },
  methods: {
    handleValueChange(value) {
      this.form.content = value;
    },

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

    // console.table(toRaw(this.categories));
  }
}
</script>
<style scoped>
.img {
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  width: 100%;
  height: 280px;
  margin-bottom: 1rem;
}

h2 {
  font-size: 2.8rem;
  font-weight: 700;
  margin-bottom: 1rem;
}

p {
  font-size: 1.8rem;
}

@media (max-width: 1435px) {
  .box-contente {
    flex-direction: column;
  }
  .box-contente div {
    width: 100%!important;
    margin-bottom: 1rem;

  }
  .wrap {
    padding: 0;
  }
}

</style>
