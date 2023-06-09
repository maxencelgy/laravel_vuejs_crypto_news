<template>
  <div :class="$attrs.class">
    <label v-if="label" class="form-label" :for="id">{{ label }}:</label>
    <ckeditor :editor="editor" :config="editorConfig" v-model="modelValue"></ckeditor>
    <div v-if="error" class="form-error">{{ error }}</div>
  </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue2';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import {uuid} from "@tinymce/tinymce-vue/lib/es2015/main/ts/Utils";

export default {
  components: {
    CKEditor,
  },
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${uuid()}`;
      },
    },
    error: String,
    label: String,
    modelValue: String,
  },
  data() {
    return {
      editor: ClassicEditor,
      editorConfig: {
        // Configuration de CKEditor ici
      },
    };
  },
};
</script>
