<template>
  <div>
    <editor v-model="content" :content="htmlCode" :init="editorConfig" @change="updateHTML;"></editor>
<!--    <text-input v-model="form.content" :error="form.errors.content" class=" pb-8 !text-gray-400 hidden pr-6 w-full"-->
<!--                    label="Contenu" :model-value="htmlCode"/>-->
    <br>
  </div>
</template>

<script>
import Editor from '@tinymce/tinymce-vue';
import TextareaInput from "@/Shared/TextareaInput.vue";
import TextInput from "@/Shared/TextInput.vue";

export default {
  components: {
    Editor,
  },
  data() {
    return {
      content: '',
      htmlCode: '',
      form: this.$inertia.form({
        content: '',
      }),
    };
  },
  watch: {
    "content": function () {
      this.$emit('contentChange', this.content)
    },
  },
  methods: {
    updateHTML(event) {
      this.htmlCode = event.target.getContent();
    },
    saveContent() {
      // Logique pour enregistrer le contenu dans la base de données
    },
  },
  computed: {
    editorConfig() {
      return {
        plugins: 'link, lists, image, table, media',

      };
    },
  },
};
</script>

<style>
.tox-notification {
  display: none !important;
}
.tox-statusbar__branding {
  display: none !important;
}
</style>
