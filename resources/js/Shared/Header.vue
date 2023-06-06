<template>
  <div>
    <header class="sticky top-0 shadow">
      <div :class="['sticky', 'top-0', 'shadow','transition-all', { 'hidden': !showElement || isUrl('login') }]"
           class="bg-darkblue-500 transition ease-in-out delay-150">
        <div class="wrap flex items-center gap-8 p-4">
          <Link :href="`/`" class="text-white hover:text-purple-500 text-lg font-semibold">Notre équipe</Link>
          <Link :href="`/`" class="text-white hover:text-purple-500 text-lg font-semibold">Contactez nous</Link>
        </div>
      </div>
      <nav class="bg-darkblue-600 ">
        <div class="wrap max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
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
          <Link v-if="$page.props.auth.user"
                class="focus:outline-none text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-lg px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-500 dark:focus:ring-purple-900"
                :href="`/profile`">Profile
          </Link>
          <!-- Contenu à afficher si l'utilisateur n'est pas connecté -->
          <Link v-else
                class="focus:outline-none text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-lg px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-500 dark:focus:ring-purple-900"
                :href="`/login`">
            S'inscrire / Se connecter
          </Link>
        </div>
      </nav>
    </header>
    <main>
      <slot></slot> <!-- Emplacement pour le contenu de la page -->
    </main>
    <footer>
      <!-- Votre contenu de pied de page -->
    </footer>
  </div>
</template>


<script>
import {Link} from '@inertiajs/inertia-vue3'
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'

export default {
  data() {
    return {
      showElement: true
    };
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  components: {
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
