<template>

    <div class="home cote"  :class="{ '!left-0' : showMobileMenu }" @click="desactiverShow" style="position: absolute; top: 0; height: 200000px; width: 100%; background-color: rgba(0,0,0,0.23); z-index: 888"></div>
    <div class="menu-burger cote " style="transition: .8s" :class="{ '!left-0' : showMobileMenu }">

      <div class="corp">
        <a @click="desactiverShow" href="/" class="flex items-center mb-44">
          <logo class="block mx-auto w-full fill-white" height="100"/>
        </a>
        <div>
          <div class="gap-4">
            <Link @click="desactiverShow" class="mt-6 text-white hover:text-purple-500 font-semibold text-xl "
                  :href="`/#selection`">
              Sélection de la semaine
            </Link>
            <Link @click="desactiverShow" class="mt-6 text-white hover:text-purple-500 font-semibold text-xl "
                  :href="`/#follow`">
              Cryptos à suivre
            </Link>

            <Link @click="desactiverShow" class="mt-6 text-white hover:text-purple-500 font-semibold text-xl "
                  :href="`/guides`">
              Guides
            </Link>
            <Link @click="desactiverShow" class="mt-6 mb-8 text-white hover:text-purple-500 font-semibold text-xl "
                  :href="`/#boutique`">La
              boutique
            </Link>
          </div>
        </div>
        <div v-if="$page.props.auth.user && showMobileMenu">
          <div id="dropdown"/>
          <div class="md:flex md:flex-col">
            <dropdown class="mt-1" placement="bottom-end">
              <template #default>
                <div class="flex justify-center items-center cursor-pointer select-none">
                  <div class="mr-1 text-gray-700 group-hover:text-indigo-600 focus:text-indigo-600 whitespace-nowrap">
                    <span class=" text-white text-xl font-semibold">{{ auth.user.first_name }}</span>
                    <span class="text-white hidden text-xl font-semibold md:inline">&nbsp;{{
                        auth.user.last_name
                      }}</span>
                  </div>
                  <icon
                    class="z-50 !text-white font-bold text-lg w-7 h-7 fill-gray-700"
                    fill=""
                    name="cheveron-down" style="fill: white!important;"/>
                </div>
              </template>
              <template #dropdown>
                <div class=" mt-2 py-2 !text-white  bg-purple-600 rounded shadow-xl">
                  <a @click="desactiverShow" v-if="auth.user.role == 3"
                        class="text-center flex items-center justify-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                        :href="`/admin`">
                    <p class="mr-1">Admin</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 128 128">
                      <path fill="#F19534"
                            d="M94.52 21.81c2.44-1.18 4.13-3.67 4.13-6.56a7.28 7.28 0 0 0-14.56 0c0 2.93 1.73 5.44 4.22 6.6c-2.88 15.6-7.3 27.21-23.75 29.69c0 0 4.43 22.15 25.15 22.15s22.82-21.93 22.82-21.93c-16.81.86-18.23-20.27-18.01-29.95z"/>
                      <path fill="#F19534"
                            d="M34.74 21.81c-2.44-1.18-4.13-3.67-4.13-6.56a7.28 7.28 0 0 1 14.56 0c0 2.93-1.73 5.44-4.22 6.6c2.88 15.6 7.3 27.21 23.75 29.69c0 0-4.43 22.15-25.15 22.15S16.74 51.77 16.74 51.77c16.8.85 18.22-20.28 18-29.96z"/>
                      <path fill="#FFCA28"
                            d="M89.43 73.69c.09 0 .18.01.27.01c5.71 0 10-1.67 13.22-4.08l-13.49 4.07z"/>
                      <path fill="#FFCA28"
                            d="M119.24 16.86c-3.33-.45-6.51 2.72-7.09 7.06c-.36 2.71.37 5.24 1.78 6.87l-2.4 9.95s-3.67 23.51-22.21 28.15C74.5 72.6 69.13 45.47 67.83 37.09c2.82-1.4 4.77-4.3 4.77-7.67c0-4.73-3.83-8.56-8.56-8.56s-8.56 3.83-8.56 8.56c0 3.39 1.98 6.32 4.85 7.7c-1.03 8.27-5.57 34.5-21.57 31.76c-16.24-2.79-23.33-30.14-24.97-37.58c1.95-1.6 3.04-4.42 2.64-7.45c-.58-4.35-4.02-7.47-7.68-6.98c-3.66.49-6.15 4.41-5.57 8.75c.42 3.16 2.36 5.67 4.79 6.62l12.72 79.03s11.1 8.77 43.35 8.77s43.35-8.77 43.35-8.77l12.75-79.24c2.06-1.08 3.68-3.51 4.08-6.49c.59-4.35-1.64-8.23-4.98-8.68z"/>
                      <ellipse cx="64.44" cy="88.3" fill="#26A69A" rx="9.74" ry="11.61"/>
                      <path fill="#69F0AE"
                            d="M64.44 79.56c.38.42.72 1.19 0 2.69s-4.6 3.53-5.31 3.94c-.71.42-1.18.23-1.4.06c-1.05-.84-.65-2.74.03-3.9c1.46-2.51 4.55-5.1 6.68-2.79z"/>
                      <path fill="#00796B"
                            d="M63.72 92.63c-1.1.53-4.71 2.14-3.52 4.05c.7 1.13 2.15 1.61 3.48 1.67c1.33.06 2.64-.36 3.82-.97c5.6-2.9 6.05-10.52 4.96-11.1c-1.12-.6-1.88.95-2.46 1.61a20.266 20.266 0 0 1-6.28 4.74z"/>
                      <path fill="#26A69A"
                            d="M118.09 78.8c1.56-8.63-4.24-10.79-4.24-10.79s-3.74-.68-5.5 9.03c-1.76 9.7 1.98 10.38 1.98 10.38s6.19.01 7.76-8.62z"/>
                      <path fill="#69F0AE"
                            d="M115.51 70.96c1.36 1.82-.25 4.51-2.86 6.3c-.77.53-1.79.33-1.94-.11c-.42-1.26-.24-2.69.32-3.9c1.66-3.63 3.79-3.21 4.48-2.29z"/>
                      <path fill="#26A69A"
                            d="M9.76 79.06C8.19 70.44 14 68.27 14 68.27s3.74-.68 5.5 9.03c1.76 9.7-1.98 10.38-1.98 10.38s-6.2.01-7.76-8.62z"/>
                      <path fill="#69F0AE"
                            d="M15.78 71.2c1.34 1 .79 2.31-.22 3.22c-1.15 1.05-2.03 2.2-3.01 3.39c-.15.18-.32.38-.56.43c-.46.1-.83-.37-.98-.82c-.43-1.26-.35-2.74.29-3.9c1.82-3.31 3.96-2.71 4.48-2.32z"/>
                      <path fill="#F44336"
                            d="M99.99 87.16c-.69 3.93-3.84 6.66-7.05 6.1c-3.21-.56-3.65-3.91-2.96-7.84c.69-3.93 2.24-6.94 5.44-6.38c3.21.56 5.26 4.2 4.57 8.12zm-69.56 0c.69 3.93 3.84 6.66 7.05 6.1s3.65-3.91 2.96-7.84c-.69-3.93-2.24-6.94-5.44-6.38s-5.25 4.2-4.57 8.12z"/>
                      <path fill="#FFA8A4"
                            d="M35.08 84.54c-.73.82-2.51 2.47-3.14 1.21c-.86-1.72.33-4.32 1.69-5.18c1.36-.86 2.47-.18 2.66.59c.23.98-.56 2.64-1.21 3.38zm56.9 2.51c-.99-.15-1.1-3.56 1.56-6.24c1.27-1.28 3.09.24 2.63 2.29c-.44 1.95-2.38 4.23-4.19 3.95z"/>
                      <path fill="#FFCA28"
                            d="M109.15 98.21c-5.99 3-19.73 10.99-45.1 10.99s-39.11-7.99-45.1-10.99c0 0-2.15 1.15-2.15 2.35v9.21c0 1.23.65 2.36 1.71 2.99c4.68 2.76 18.94 9.28 45.55 9.28s40.87-6.52 45.55-9.28a3.475 3.475 0 0 0 1.71-2.99v-9.21c-.02-1.2-2.17-2.35-2.17-2.35z"/>
                      <path fill="#FFF59D"
                            d="M39.6 110.84c2.8.55 3.65.79 3.46 2.35c-.39 3.07-6.76 2.34-10.53 1.35c-7.79-2.05-9.37-4.21-9.37-6.14c0-1.77 1.36-1.98 3.46-1.24c2.51.89 6.39 2.39 12.98 3.68z"/>
                      <path fill="none" stroke="#F19534" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="4" d="M109.15 100.23s-16.57 9.38-45.1 9.38s-45.1-9.38-45.1-9.38"/>
                      <path fill="#FFCA28"
                            d="M26.97 49.57c5.32-3.8 8.18-10.61 8.43-21.45c.02-.98.3-1.27.83-1.33c.85-.09.99.68.98 1.23c-.24 11.7-1.73 19.01-7.63 23.13c-.29.2-2.36 1.46-3.24.59c-1.05-1.02.29-1.93.63-2.17zm4.87-34.03c-.17-1.81.25-5.07 5-6.55c1.39-.43 2.25.25 2.41.78c.4 1.32-.76 1.84-1.29 2.01c-3.65 1.18-3.83 3-4.58 4.16s-1.48.15-1.54-.4zm46.38 31.63c4.81-4.27 8-9.04 10.1-19.9c.19-.96.47-1.22.99-1.2c.85.02.89.81.8 1.35c-1.78 11.58-3.47 14.88-9.4 21.45c-.67.74-2.3 1.41-3.22.64c-.83-.69.13-1.8.73-2.34zm7.08-31.54c-.17-1.81.25-5.07 5-6.55c1.39-.43 2.25.25 2.41.78c.4 1.32-.76 1.84-1.29 2.01c-3.65 1.18-3.83 3-4.58 4.16c-.74 1.16-1.48.15-1.54-.4z"/>
                      <path fill="#FFF59D"
                            d="M31.59 71.62C19.97 66.35 16.55 52.6 14.73 46.63c-.24-.79-.12-1.54.67-1.78s1.26.27 1.51 1.06c1.32 4.33 6.45 18.79 17.04 22.9c.77.3 1.97 1.03 1.32 2.28c-.43.81-1.81 1.38-3.68.53zM12.68 24.63c-.56-1.16-.79-2.26-3.84-3.53c-.77-.32-1.28-1.03-1.07-1.83s1.01-1.4 2.17-1.2c3.77.65 4.59 4.48 4.75 5.81c.15 1.28-1.44 1.91-2.01.75zm84.19 46.99c11.62-5.27 15.04-19.02 16.86-24.99c.24-.79.12-1.54-.67-1.78s-1.26.27-1.51 1.06c-1.32 4.33-6.45 18.79-17.04 22.9c-.77.3-1.97 1.03-1.32 2.28c.43.81 1.81 1.38 3.68.53zm18.91-46.99c.56-1.16.79-2.26 3.84-3.53c.77-.32 1.28-1.03 1.07-1.83s-1.01-1.4-2.17-1.2c-3.77.65-4.59 4.48-4.75 5.81c-.15 1.28 1.45 1.91 2.01.75zm-56.4 4.92c.61-1.25 1.68-2.96 5.17-3.68c1.34-.28 1.73-.86 1.61-1.74c-.24-1.83-2.52-1.7-3.75-1.41c-4.1.96-5.01 4.6-5.18 6.04c-.17 1.37 1.55 2.04 2.15.79z"/>
                    </svg>
                  </a>

                  <Link @click="desactiverShow"
                        class="text-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                        :href="`/profil`">Mon
                    profil
                  </Link>
                  <a @click="desactiverShow" v-if="auth.user.role == 3 || auth.user.role == 2"
                        class="text-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                        href="/guides/create">
                    Poster un article
                  </a>
                  <Link @click="desactiverShow"
                        class="text-center text-lg block px-6 py-2 w-full text-left hover:text-white hover:bg-indigo-500"
                        href="/logout"
                        method="delete" as="button">Déconnexion
                  </Link>
                </div>
              </template>
            </dropdown>
          </div>
        </div>
        <div v-else class=" text-center">
          <Link @click="desactiverShow"
                class="focus:outline-none transition-all  text-black  bg-yellowFirst-600 hover:bg-yellowFirst-700 hover:text-white focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-lg px-5 py-2.5 mb-2"
                :href="`/login`">
            S'inscrire / Se connecter
          </Link>
        </div>
      </div>
    </div>
    <div class="z-80 sticky" style="top: -1px; z-index: 900;">
      <nav class="z-80 bg-purple-600" :class="{ '!bg-purple-400 shadow': !showElement }">
        <div class="z-80 wrap flex flex-wrap items-center justify-between  p-2 nav">
          <div class="flex items-center">
            <Link :href="`/`" class="flex items-center  logo">
              <logo class=" fill-white" height="100"/>
            </Link>
            <div class="gap-4">
              <Link class="not-hidden not-hidden-desktop text-white hover:text-purple-500 font-semibold text-xl ml-8"
                    :href="`/#selection`">
                Sélection de la semaine
              </Link>
              <Link class="not-hidden not-hidden-desktop text-white hover:text-purple-500 font-semibold text-xl ml-8"
                    :href="`/#follow`">
                Cryptos à suivre
              </Link>
              <Link class="not-hidden not-hidden-desktop text-white hover:text-purple-500 font-semibold text-xl ml-8"
                    :href="`/guides`">
                Guides
              </Link>
              <Link class="not-hidden not-hidden-desktop text-white hover:text-purple-500 font-semibold text-xl ml-8"
                    :href="`/#boutique`">La
                boutique
              </Link>
            </div>

          </div>
          <div class="not-hidden not-hidden-desktop" v-if="$page.props.auth.user">
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
                  <div class=" mt-2 py-2 text-sm bg-white rounded shadow-xl">
                    <a v-if="auth.user.role == 3"
                          class="text-center flex items-center justify-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                          :href="`/admin`">
                      <p class="mr-1">Admin</p>
                      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 128 128">
                        <path fill="#F19534"
                              d="M94.52 21.81c2.44-1.18 4.13-3.67 4.13-6.56a7.28 7.28 0 0 0-14.56 0c0 2.93 1.73 5.44 4.22 6.6c-2.88 15.6-7.3 27.21-23.75 29.69c0 0 4.43 22.15 25.15 22.15s22.82-21.93 22.82-21.93c-16.81.86-18.23-20.27-18.01-29.95z"/>
                        <path fill="#F19534"
                              d="M34.74 21.81c-2.44-1.18-4.13-3.67-4.13-6.56a7.28 7.28 0 0 1 14.56 0c0 2.93-1.73 5.44-4.22 6.6c2.88 15.6 7.3 27.21 23.75 29.69c0 0-4.43 22.15-25.15 22.15S16.74 51.77 16.74 51.77c16.8.85 18.22-20.28 18-29.96z"/>
                        <path fill="#FFCA28"
                              d="M89.43 73.69c.09 0 .18.01.27.01c5.71 0 10-1.67 13.22-4.08l-13.49 4.07z"/>
                        <path fill="#FFCA28"
                              d="M119.24 16.86c-3.33-.45-6.51 2.72-7.09 7.06c-.36 2.71.37 5.24 1.78 6.87l-2.4 9.95s-3.67 23.51-22.21 28.15C74.5 72.6 69.13 45.47 67.83 37.09c2.82-1.4 4.77-4.3 4.77-7.67c0-4.73-3.83-8.56-8.56-8.56s-8.56 3.83-8.56 8.56c0 3.39 1.98 6.32 4.85 7.7c-1.03 8.27-5.57 34.5-21.57 31.76c-16.24-2.79-23.33-30.14-24.97-37.58c1.95-1.6 3.04-4.42 2.64-7.45c-.58-4.35-4.02-7.47-7.68-6.98c-3.66.49-6.15 4.41-5.57 8.75c.42 3.16 2.36 5.67 4.79 6.62l12.72 79.03s11.1 8.77 43.35 8.77s43.35-8.77 43.35-8.77l12.75-79.24c2.06-1.08 3.68-3.51 4.08-6.49c.59-4.35-1.64-8.23-4.98-8.68z"/>
                        <ellipse cx="64.44" cy="88.3" fill="#26A69A" rx="9.74" ry="11.61"/>
                        <path fill="#69F0AE"
                              d="M64.44 79.56c.38.42.72 1.19 0 2.69s-4.6 3.53-5.31 3.94c-.71.42-1.18.23-1.4.06c-1.05-.84-.65-2.74.03-3.9c1.46-2.51 4.55-5.1 6.68-2.79z"/>
                        <path fill="#00796B"
                              d="M63.72 92.63c-1.1.53-4.71 2.14-3.52 4.05c.7 1.13 2.15 1.61 3.48 1.67c1.33.06 2.64-.36 3.82-.97c5.6-2.9 6.05-10.52 4.96-11.1c-1.12-.6-1.88.95-2.46 1.61a20.266 20.266 0 0 1-6.28 4.74z"/>
                        <path fill="#26A69A"
                              d="M118.09 78.8c1.56-8.63-4.24-10.79-4.24-10.79s-3.74-.68-5.5 9.03c-1.76 9.7 1.98 10.38 1.98 10.38s6.19.01 7.76-8.62z"/>
                        <path fill="#69F0AE"
                              d="M115.51 70.96c1.36 1.82-.25 4.51-2.86 6.3c-.77.53-1.79.33-1.94-.11c-.42-1.26-.24-2.69.32-3.9c1.66-3.63 3.79-3.21 4.48-2.29z"/>
                        <path fill="#26A69A"
                              d="M9.76 79.06C8.19 70.44 14 68.27 14 68.27s3.74-.68 5.5 9.03c1.76 9.7-1.98 10.38-1.98 10.38s-6.2.01-7.76-8.62z"/>
                        <path fill="#69F0AE"
                              d="M15.78 71.2c1.34 1 .79 2.31-.22 3.22c-1.15 1.05-2.03 2.2-3.01 3.39c-.15.18-.32.38-.56.43c-.46.1-.83-.37-.98-.82c-.43-1.26-.35-2.74.29-3.9c1.82-3.31 3.96-2.71 4.48-2.32z"/>
                        <path fill="#F44336"
                              d="M99.99 87.16c-.69 3.93-3.84 6.66-7.05 6.1c-3.21-.56-3.65-3.91-2.96-7.84c.69-3.93 2.24-6.94 5.44-6.38c3.21.56 5.26 4.2 4.57 8.12zm-69.56 0c.69 3.93 3.84 6.66 7.05 6.1s3.65-3.91 2.96-7.84c-.69-3.93-2.24-6.94-5.44-6.38s-5.25 4.2-4.57 8.12z"/>
                        <path fill="#FFA8A4"
                              d="M35.08 84.54c-.73.82-2.51 2.47-3.14 1.21c-.86-1.72.33-4.32 1.69-5.18c1.36-.86 2.47-.18 2.66.59c.23.98-.56 2.64-1.21 3.38zm56.9 2.51c-.99-.15-1.1-3.56 1.56-6.24c1.27-1.28 3.09.24 2.63 2.29c-.44 1.95-2.38 4.23-4.19 3.95z"/>
                        <path fill="#FFCA28"
                              d="M109.15 98.21c-5.99 3-19.73 10.99-45.1 10.99s-39.11-7.99-45.1-10.99c0 0-2.15 1.15-2.15 2.35v9.21c0 1.23.65 2.36 1.71 2.99c4.68 2.76 18.94 9.28 45.55 9.28s40.87-6.52 45.55-9.28a3.475 3.475 0 0 0 1.71-2.99v-9.21c-.02-1.2-2.17-2.35-2.17-2.35z"/>
                        <path fill="#FFF59D"
                              d="M39.6 110.84c2.8.55 3.65.79 3.46 2.35c-.39 3.07-6.76 2.34-10.53 1.35c-7.79-2.05-9.37-4.21-9.37-6.14c0-1.77 1.36-1.98 3.46-1.24c2.51.89 6.39 2.39 12.98 3.68z"/>
                        <path fill="none" stroke="#F19534" stroke-linecap="round" stroke-miterlimit="10"
                              stroke-width="4" d="M109.15 100.23s-16.57 9.38-45.1 9.38s-45.1-9.38-45.1-9.38"/>
                        <path fill="#FFCA28"
                              d="M26.97 49.57c5.32-3.8 8.18-10.61 8.43-21.45c.02-.98.3-1.27.83-1.33c.85-.09.99.68.98 1.23c-.24 11.7-1.73 19.01-7.63 23.13c-.29.2-2.36 1.46-3.24.59c-1.05-1.02.29-1.93.63-2.17zm4.87-34.03c-.17-1.81.25-5.07 5-6.55c1.39-.43 2.25.25 2.41.78c.4 1.32-.76 1.84-1.29 2.01c-3.65 1.18-3.83 3-4.58 4.16s-1.48.15-1.54-.4zm46.38 31.63c4.81-4.27 8-9.04 10.1-19.9c.19-.96.47-1.22.99-1.2c.85.02.89.81.8 1.35c-1.78 11.58-3.47 14.88-9.4 21.45c-.67.74-2.3 1.41-3.22.64c-.83-.69.13-1.8.73-2.34zm7.08-31.54c-.17-1.81.25-5.07 5-6.55c1.39-.43 2.25.25 2.41.78c.4 1.32-.76 1.84-1.29 2.01c-3.65 1.18-3.83 3-4.58 4.16c-.74 1.16-1.48.15-1.54-.4z"/>
                        <path fill="#FFF59D"
                              d="M31.59 71.62C19.97 66.35 16.55 52.6 14.73 46.63c-.24-.79-.12-1.54.67-1.78s1.26.27 1.51 1.06c1.32 4.33 6.45 18.79 17.04 22.9c.77.3 1.97 1.03 1.32 2.28c-.43.81-1.81 1.38-3.68.53zM12.68 24.63c-.56-1.16-.79-2.26-3.84-3.53c-.77-.32-1.28-1.03-1.07-1.83s1.01-1.4 2.17-1.2c3.77.65 4.59 4.48 4.75 5.81c.15 1.28-1.44 1.91-2.01.75zm84.19 46.99c11.62-5.27 15.04-19.02 16.86-24.99c.24-.79.12-1.54-.67-1.78s-1.26.27-1.51 1.06c-1.32 4.33-6.45 18.79-17.04 22.9c-.77.3-1.97 1.03-1.32 2.28c.43.81 1.81 1.38 3.68.53zm18.91-46.99c.56-1.16.79-2.26 3.84-3.53c.77-.32 1.28-1.03 1.07-1.83s-1.01-1.4-2.17-1.2c-3.77.65-4.59 4.48-4.75 5.81c-.15 1.28 1.45 1.91 2.01.75zm-56.4 4.92c.61-1.25 1.68-2.96 5.17-3.68c1.34-.28 1.73-.86 1.61-1.74c-.24-1.83-2.52-1.7-3.75-1.41c-4.1.96-5.01 4.6-5.18 6.04c-.17 1.37 1.55 2.04 2.15.79z"/>
                      </svg>
                    </a>
                    <Link class="text-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                          :href="`/profil`">Mon
                      profil
                    </Link>
                    <a v-if="auth.user.role == 3 || auth.user.role == 2"
                          class="text-center text-lg block px-6 py-2 hover:text-white hover:bg-indigo-500 "
                          href="/guides/create">
                      Poster un article
                    </a>
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
          <Link style="z-index: 99999" v-else
                class="not-hidden not-hidden-desktop  focus:outline-none transition-all  text-black uppercase bg-yellowFirst-600 hover:bg-yellowFirst-700 hover:text-white focus:ring-4 focus:ring-purple-300 font-semibold rounded-lg text-base px-5 py-2.5 mb-2"
                :href="`/login`">
            S'inscrire / Se connecter
          </Link>
          <div style="z-index: 99999" class="is-hidden text-white" @click="activerShow"
               :class="{ '!hidden' : showMobileMenu }">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 14 14">
              <path fill="none" stroke="#8B60ED" stroke-linecap="round" stroke-linejoin="round"
                    d="M13.5 2H.5m13 5H.5m13 5H.5"/>
            </svg>
          </div>
          <div style="z-index: 99999" class="not-hidden text-white" @click="desactiverShow"
               :class="{ 'is-hidden' : showMobileMenu }">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 14 14">
              <path fill="none" stroke="#8B60ED" stroke-linecap="round" stroke-linejoin="round"
                    d="M13.5 2H6m5 5H3.5m5 5h-8"/>
            </svg>
          </div>
        </div>

      </nav>
    </div>

    <main class="min-h-[70vh] bg-purple-600">
      <slot class=""></slot> <!-- Emplacement pour le contenu de la page -->
    </main>

  <footer class="bg-purple-400 py-16">
    <div class="wrap flex items-start justify-between">
      <div class="text-left">
        <Link :href="`/`" class="flex items-center mr-6">
          <logo class="block mx-auto w-full fill-white" height="100"/>
        </Link>
        <p class="text-lg text-gray-400">Copyright © 2023 daily-crypto.fr</p>
      </div>
      <div class="flex flex-col">
        <h3 class="text-2xl mb-4 font-semibold text-white">À propos</h3>
        <Link :href="`/#selection`" class="text-gray-400 mb-2 text-lg hover:text-purple-500 cursor-pointer">Sélection de
          la semaine
        </Link>
        <Link :href="`/#follow`" class="text-gray-400 mb-2 text-lg hover:text-purple-500 cursor-pointer">Cryptos à
          suivre
        </Link>
        <Link :href="`/guides`" class="text-gray-400 mb-2 text-lg hover:text-purple-500 cursor-pointer">Guides</Link>
        <a href="https://shop.dailycrypto.fr" target="_blank" class="text-gray-400 mb-2 text-lg hover:text-purple-500 cursor-pointer">La boutique
        </a>
      </div>
      <div>
        <h3 class="text-2xl mb-4 font-semibold text-white">Mentions légales</h3>
        <Link :href="`/mentions-legales`" class="text-gray-400 mb-8 text-lg hover:text-purple-500 cursor-pointer">
          Mentions legales
        </Link>
        <br>
        <Link :href="`/politique`" class="text-gray-400 mb-2 text-lg hover:text-purple-500 cursor-pointer">Politique de
          confidentialité
        </Link>
      </div>
      <div>
        <h3 class="text-2xl mb-4 font-semibold text-white">Réseaux sociaux</h3>
        <div class="flex items-center text-gray-400 justify-between">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M12.001 9a3 3 0 1 0 0 6a3 3 0 0 0 0-6Zm0-2a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm6.5-.25a1.25 1.25 0 0 1-2.5 0a1.25 1.25 0 0 1 2.5 0ZM12.001 4c-2.474 0-2.878.007-4.029.058c-.784.037-1.31.142-1.798.332a2.886 2.886 0 0 0-1.08.703a2.89 2.89 0 0 0-.704 1.08c-.19.49-.295 1.015-.331 1.798C4.007 9.075 4 9.461 4 12c0 2.475.007 2.878.058 4.029c.037.783.142 1.31.331 1.797c.17.435.37.748.702 1.08c.337.336.65.537 1.08.703c.494.191 1.02.297 1.8.333C9.075 19.994 9.461 20 12 20c2.475 0 2.878-.007 4.029-.058c.782-.037 1.308-.142 1.797-.331a2.91 2.91 0 0 0 1.08-.703c.337-.336.538-.649.704-1.08c.19-.492.296-1.018.332-1.8c.052-1.103.058-1.49.058-4.028c0-2.474-.007-2.878-.058-4.029c-.037-.782-.143-1.31-.332-1.798a2.912 2.912 0 0 0-.703-1.08a2.884 2.884 0 0 0-1.08-.704c-.49-.19-1.016-.295-1.798-.331C14.926 4.006 14.54 4 12 4Zm0-2c2.717 0 3.056.01 4.123.06c1.064.05 1.79.217 2.427.465c.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428c.047 1.066.06 1.405.06 4.122c0 2.717-.01 3.056-.06 4.122c-.05 1.065-.218 1.79-.465 2.428a4.884 4.884 0 0 1-1.153 1.772a4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.427.465c-1.067.047-1.406.06-4.123.06c-2.717 0-3.056-.01-4.123-.06c-1.064-.05-1.789-.218-2.427-.465a4.89 4.89 0 0 1-1.772-1.153a4.905 4.905 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428c-.048-1.066-.06-1.405-.06-4.122c0-2.717.01-3.056.06-4.122c.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772a4.897 4.897 0 0 1 1.772-1.153c.637-.248 1.362-.415 2.427-.465C8.945 2.013 9.284 2 12.001 2Z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
            <path fill="currentColor"
                  d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"/>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 256 256">
            <path fill="currentColor"
                  d="M236.88 26.19a9 9 0 0 0-9.16-1.57L25.06 103.93a14.22 14.22 0 0 0 2.43 27.21L80 141.45V200a15.92 15.92 0 0 0 10 14.83a15.91 15.91 0 0 0 17.51-3.73l25.32-26.26L173 220a15.88 15.88 0 0 0 10.51 4a16.3 16.3 0 0 0 5-.79a15.85 15.85 0 0 0 10.67-11.63L239.77 35a9 9 0 0 0-2.89-8.81Zm-61.14 36l-89.59 64.16l-49.6-9.73ZM96 200v-47.48l24.79 21.74Zm87.53 8l-82.68-72.5l119-85.29Z"/>
          </svg>
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

export default {
  data() {
    return {
      showElement: true,
      showMobileMenu: false

    };
  },
  props: {
    auth: Object,
  },
  mounted() {
    // console.table(toRaw(this.auth));
    window.addEventListener('scroll', this.handleScroll);
  },

  beforeUnmount() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  components: {
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
    activerShow() {
      this.showMobileMenu = true
    },
    desactiverShow() {
      this.showMobileMenu = false
      console.log(this.showMobileMenu);
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

<style>
.cote {
  left: -100%;
}

html {
  scroll-behavior: smooth;
}

.hidden {
  display: none;
}

.is-hidden {
  display: none;
}

.not-hidden-desktop {
  display: initial !important;
}

.not-hidden {
  display: none;
}

.menu-burger {
  background-color: #252345;
  position: fixed;
  width: 550px;
  min-height: 2000px;
  z-index: 1000;
  border-top-right-radius: 1.5rem;
  border-bottom-right-radius: 1.5rem;
  box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
  transition: all 0.3s ease-in-out;

}

.menu-burger .gap-4 {
  display: flex;
  flex-direction: column;
  text-align: center;
  margin: 0;
}

.corp {
  display: flex;
  flex-direction: column;
  text-align: center;
}

@media (max-width: 1075px) {
  .not-hidden {
    display: none;
  }

  .is-hidden {
    display: flex;
  }

  .not-hidden-desktop {
    display: none !important;
  }
}

.menu-burger #dropdown div div {
  position: static !important;
  transform: none !important;
}

@media (max-width: 740px) {
  .menu-burger {
    width: 290px;
  }

  .nav {
    padding: 1rem;
    flex-wrap: nowrap;
    justify-content: space-between !important;
  }

  .logo {
    margin: 0 !important;
  }
  .logo svg {
    height: 65px !important;
  }
  .mb-44 {
    margin-bottom: 1rem !important;
  }
}

@media (max-width: 345px) {
  .logo {
    margin-right: 0;
  }
}
</style>
