<template>
  <Header>
    <Head title="Connexion"/>
    <div class="flex items-center justify-center p-6  bg-purple-600">
      <div class="w-full max-w-2xl">

        <form class="mt-8 bg-purple-400 text-white rounded-lg shadow-xl overflow-hidden" @submit.prevent="login">
          <div class="px-10 py-12">
            <h1 class="text-center text-3xl font-bold">Content De Vous Revoir ! </h1>
            <div class="m-4 mt-6 mx-auto w-24 border-b-2 border-purple-500" />
            <text-input v-model="form.email" :error="form.errors.email" class="mt-10 text-base" label="Email " type="email" autofocus autocapitalize="off" />
            <text-input v-model="form.password" :error="form.errors.password" class="mt-6 text-base" label="Mot de passe " type="password" />
            <label class="flex items-center mt-6 select-none" for="remember">
              <input id="remember" v-model="form.remember" class="mr-1" type="checkbox" />
              <span class="text-base">Se rappeler de moi</span>
            </label>
          </div>
          <div class="px-10 py-4 bg-purple-400 border-t border-purple-500" >
            <loading-button :loading="form.processing" class="btn-indigo text-center w-full" type="submit">Connexion</loading-button>
            <br>
            <br>
            <p class="text-lg text-center">Nouveau sur Daily Crypto ? <br> <Link class="text-purple-500 font-medium text-lg text-blue-600 underline dark:text-blue-500 hover:no-underline" :href="`inscription`"> S'inscrire ici </Link> </p>
          </div>
        </form>
      </div>
    </div>

  </Header>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'
import Header from '@/Shared/Corp.vue'

export default {
  components: {
    Link,
    Head,
    LoadingButton,
    TextInput,
  },
  layout: Header,
  data() {
    return {
      form: this.$inertia.form({
        email: 'johndoe@example.com',
        password: 'secret',
        remember: false,
      }),
    }
  },
  methods: {
    login() {
      this.form.post('/login')
    },
  },
}
</script>
