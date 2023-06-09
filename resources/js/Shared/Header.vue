<template>
  <div>
    <div class="z-40 sticky top-0">
      <nav class="bg-purple-600" :class="{ '!bg-purple-400 shadow': !showElement }">
        <div class="wrap max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
          <div class="flex items-center">
            <Link :href="`/`" class="flex items-center mr-6">
              <logo class="block mx-auto w-full fill-white" height="100"/>
            </Link>
            <div class="gap-4">
              <Link class="text-white hover:text-purple-500 font-semibold text-xl ml-8" :href="`/`">Accueil</Link>
              <Link class="text-white hover:text-purple-500 font-semibold text-xl ml-8" :href="`/`">Guides</Link>
              <Link class="text-white hover:text-purple-500 font-semibold text-xl ml-8" :href="`/`">Tutoriel</Link>
              <Link class="text-white hover:text-purple-500 font-semibold text-xl ml-8" :href="`/`">Actualités</Link>
              <Link class="text-white hover:text-purple-500 font-semibold text-xl ml-8" :href="`/`">A propos de nous
              </Link>
            </div>
          </div>
          <div v-if="$page.props.auth.user">
            <div id="dropdown"/>
            <div class="md:flex md:flex-col">
              <dropdown class="mt-1" placement="bottom-end">
                <template #default>
                  <div class="group flex items-center cursor-pointer select-none">
                    <div class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap">
                      <span class=" text-white text-lg font-semibold">{{ auth.user.first_name }}</span>
                      <span class="text-white hidden text-lg font-semibold md:inline">&nbsp;{{
                          auth.user.last_name
                        }}</span>
                    </div>
                    <icon
                      class="!text-white font-bold text-lg w-5 h-5 fill-gray-700 group-hover:fill-indigo-600 focus:fill-indigo-600"
                      name="cheveron-down"/>
                  </div>
                </template>
                <template #dropdown>
                  <div class="mt-2 py-2 text-sm bg-white rounded shadow-xl">
                    <Link class="text-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                          :href="`/profil`">Mon
                      profil
                    </Link>
                    <Link v-if="auth.user.role == 3 || auth.user.role == 2"
                          class="text-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                          :href="`/guides/create`">
                      Poster un article
                    </Link>
                    <Link
                      class="text-center text-lg block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500"
                      href="/logout"
                      method="delete" as="button">Déconnexion
                    </Link>
                  </div>
                </template>
              </dropdown>
            </div>
          </div>

          <!-- Contenu à afficher si l'utilisateur n'est pas connecté -->
          <Link v-else
                class="text-black focus:outline-none transition-all  text-black uppercase bg-yellowFirst-600 hover:bg-yellowFirst-700 hover:text-white focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-lg px-5 py-2.5 mb-2"
                :href="`/login`">
            S'inscrire / Se connecter
          </Link>
        </div>
      </nav>
    </div>
    <main>
      <slot></slot> <!-- Emplacement pour le contenu de la page -->
    </main>
  </div>
  <footer class="bg-purple-400 py-16">
    <div class="wrap flex items-start justify-between">
      <div class="text-left">
        <Link :href="`/`" class="flex items-center mr-6">
          <logo class="block mx-auto w-full fill-white" height="100"/>
        </Link>
        <p class="text-lg text-gray-400">Copyright © 2023 daily-crypto.fr</p>
      </div>
      <div>
        <h3 class="text-2xl mb-4 font-semibold text-white">À propos</h3>
        <p class="text-gray-400 mb-2 text-lg">Notre équipe</p>
        <p class="text-gray-400 mb-2 text-lg">Nous contacter</p>
        <p class="text-gray-400 mb-2 text-lg">azdzad</p>
        <p class="text-gray-400 mb-2 text-lg">ezkn</p>
      </div>
      <div>
        <h3 class="text-2xl mb-4 font-semibold text-white">Mentions légales</h3>
        <p class="text-gray-400 mb-2 text-lg">Mention legales</p>

        <p class="text-gray-400 mb-2 text-lg">Politique de confidentialité</p>
      </div>
      <div>
        <h3 class="text-2xl mb-4 font-semibold text-white">Réseaux sociaux</h3>
        <div class="flex items-center text-gray-400 justify-between">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M12.001 9a3 3 0 1 0 0 6a3 3 0 0 0 0-6Zm0-2a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm6.5-.25a1.25 1.25 0 0 1-2.5 0a1.25 1.25 0 0 1 2.5 0ZM12.001 4c-2.474 0-2.878.007-4.029.058c-.784.037-1.31.142-1.798.332a2.886 2.886 0 0 0-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.007 9.075 4 9.461 4 12c0 2.475.007 2.878.058 4.029c.037.783.142 1.31.331 1.797c.17.435.37.748.702 1.08c.337.336.65.537 1.08.703c.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.475 0 2.878-.007 4.029-.058c.782-.037 1.308-.142 1.797-.331a2.91 2.91 0 0 0 1.08-.703c.337-.336.538-.649.704-1.08c.19-.492.296-1.018.332-1.8c.052-1.103.058-1.49.058-4.028c0-2.474-.007-2.878-.058-4.029c-.037-.782-.143-1.31-.332-1.798a2.912 2.912 0 0 0-.703-1.08a2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.926 4.006 14.54 4 12 4Zm0-2c2.717 0 3.056.01 4.123.06c1.064.05 1.79.217 2.427.465c.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.047 1.066.06 1.405.06 4.122c0 2.717-.01 3.056-.06 4.122c-.05 1.065-.218 1.79-.465 2.428a4.884 4.884 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-1.067.047-1.406.06-4.123.06c-2.717 0-3.056-.01-4.123-.06c-1.064-.05-1.789-.218-2.427-.465a4.89 4.89 0 0 1-1.772-1.153a4.905 4.905 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428c-.048-1.066-.06-1.405-.06-4.122c0-2.717.01-3.056.06-4.122c.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772a4.897 4.897 0 0 1 1.772-1.153c.637-.248 1.362-.415 2.427-.465C8.945 2.013 9.284 2 12.001 2Z"/></svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24"><path fill="currentColor" d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"/></svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 256 256"><path fill="currentColor" d="M236.88 26.19a9 9 0 0 0-9.16-1.57L25.06 103.93a14.22 14.22 0 0 0 2.43 27.21L80 141.45V200a15.92 15.92 0 0 0 10 14.83a15.91 15.91 0 0 0 17.51-3.73l25.32-26.26L173 220a15.88 15.88 0 0 0 10.51 4a16.3 16.3 0 0 0 5-.79a15.85 15.85 0 0 0 10.67-11.63L239.77 35a9 9 0 0 0-2.89-8.81Zm-61.14 36l-89.59 64.16l-49.6-9.73ZM96 200v-47.48l24.79 21.74Zm87.53 8l-82.68-72.5l119-85.29Z"/></svg>
        </div>
      </div>
    </div>

  </footer>

</template>


<script>
import {Link} from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import Dropdown from "@/Shared/Dropdown.vue";
import MainMenu from "@/Shared/MainMenu.vue";
import FlashMessages from "@/Shared/FlashMessages.vue";
import {toRaw} from "vue";

export default {
  data() {
    return {
      showElement: true
    };
  },
  props: {
    auth: Object,
  },
  mounted() {
    console.table(toRaw(this.auth));
    window.addEventListener('scroll', this.handleScroll);
  },

  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  components: {
    FlashMessages,
    MainMenu,
    Dropdown,
    Icon,
    Link,
    Logo,
  },
  methods: {
    isUrl(...urls) {
      let currentUrl = this.$page.url.substr(1)
      if (urls[0] === '') {
        return currentUrl === ''
      }
      return urls.filter((url) => currentUrl.startsWith(url)).length
    },

    handleScroll() {
      // Votre logique pour déterminer quand faire disparaître l'élément
      // Par exemple, vous pouvez utiliser la position de défilement pour déclencher l'action
      if (window.pageYOffset > 1) {
        this.showElement = false;
      } else {
        this.showElement = true;
      }
    },
  },
}
</script>
