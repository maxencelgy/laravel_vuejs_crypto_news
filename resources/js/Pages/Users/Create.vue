<template>
  <Header>
    <Head title="Inscription"/>
    <div class="flex items-center justify-center p-6  bg-indigo-800">
      <div class="w-full max-w-2xl">
        <form class="mt-8 bg-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="store">
          <div class="px-10 py-12">
            <h1 class="text-center text-3xl font-bold">Inscrivez-Vous Facilement ! </h1>
            <div class="m-4 mt-6 mx-auto w-24 border-b-2" />

            <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full"
                        label="First name * "/>
            <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full"
                        label="Last name * "/>
            <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full"
                        label="Email * "/>
            <text-input v-model="form.password" :error="form.errors.password" class="pb-8 pr-6 w-full"
                        type="password" autocomplete="new-password" label="Password * "/>
            <file-input v-model="form.photo" :error="form.errors.photo" class="pb-8 pr-6 w-full" type="file"
                        accept="image/*" label="Photo"/>
          </div>

          <div class="px-10 py-4 bg-gray-100 border-t border-gray-100">
            <loading-button :loading="form.processing" class="btn-indigo text-center w-full" type="submit">S'inscrire</loading-button>
            <br>
            <br>
            <p class="text-lg text-center">Vous avez déjà un compte ? <br> <Link class="text-purple-500 font-medium text-lg text-blue-600 underline dark:text-blue-500 hover:no-underline" :href="`login`"> Se connecté ici </Link> </p>
          </div>
        </form>
      </div>
    </div>
  </Header>
</template>


<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import FileInput from '@/Shared/FileInput'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import Header from '@/Shared/Header'

export default {
  components: {
    FileInput,
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
        first_name: '',
        last_name: '',
        email: '',
        password: '',
        owner: false,
        photo: null,
      }),
    }
  },
  methods: {
    store() {
      this.form.post('/inscription')
    },
  },
}
</script>


