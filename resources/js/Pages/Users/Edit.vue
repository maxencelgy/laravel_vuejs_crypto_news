<template>
  <Header>
    <div class="bg-purple-600 p-6">
      <Head :title="`${form.first_name} ${form.last_name}`"/>

      <div class="flex items-center justify-center mb-8 ">
        <img v-if="user.photo" class=" block ml-4 w-8 h-8 rounded-full" :src="user.photo"/>
      </div>
      <div class="flex items-center justify-center">

        <div class="max-w-3xl bg-purple-400  rounded-md shadow overflow-hidden">
          <form @submit.prevent="update">
            <div class="px-10 py-12">
              <h1 class="text-center text-3xl font-bold text-white">Modifier Votre Profil</h1>
              <div class="m-4 mt-6 mx-auto w-24 border-b-2 border-purple-500"/>
              <div class="flex flex-wrap -mb-8 -mr-6 p-8">
                <text-input v-model="form.first_name" :error="form.errors.first_name" class="pb-8 pr-6 w-full lg:w-1/2"
                            label="First name"/>
                <text-input v-model="form.last_name" :error="form.errors.last_name" class="pb-8 pr-6 w-full lg:w-1/2"
                            label="Last name"/>
                <text-input v-model="form.email" :error="form.errors.email" class="pb-8 pr-6 w-full lg:w-1/2"
                            label="Email"/>

<!--                <text-input v-model="form.password" :error="form.errors.password" class="pb-8 pr-6 w-full lg:w-1/2"-->
<!--                            type="password" autocomplete="new-password" label="Password"/>-->
                <file-input v-model="form.photo" :error="form.errors.photo" class="pb-8 pr-6 w-full lg:w-1/2"
                            type="file"
                            accept="image/*" label="Photo"/>
              </div>
              <div class="flex items-center px-8 py-4 bg-purple-400 border-t border-purple-500 ">
<!--                <button v-if="!user.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button"-->
<!--                        @click="destroy">Delete User-->
<!--                </button>-->
                <loading-button :loading="form.processing" class="btn-indigo w-full" type="submit">Mettre à jour le profil
                </loading-button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </Header>
</template>

<script>
import {Head, Link} from '@inertiajs/inertia-vue3'
// import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import FileInput from '@/Shared/FileInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import TrashedMessage from '@/Shared/TrashedMessage'
import Header from '@/Shared/Corp.vue'

export default {
  components: {
    FileInput,
    Head,
    Link,
    LoadingButton,
    SelectInput,
    TextInput,
    TrashedMessage,
  },
  layout: Header,
  props: {
    user: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
        _method: 'put',
        first_name: this.user.first_name,
        last_name: this.user.last_name,
        email: this.user.email,
        password: '',
        owner: this.user.owner,
        role: this.user.role,
        photo: null,
      }),
    }
  },
  mounted() {
    console.log(this.user.role)
  },
  methods: {
    update() {
      this.form.post(`/users/${this.user.id}`, {
        onSuccess: () => this.form.reset('password', 'photo'),
      })
    },
    destroy() {
      if (confirm('Are you sure you want to delete this user?')) {
        this.$inertia.delete(`/users/${this.user.id}`)
      }
    },
    restore() {
      if (confirm('Are you sure you want to restore this user?')) {
        this.$inertia.put(`/users/${this.user.id}/restore`)
      }
    },
  },
}
</script>
