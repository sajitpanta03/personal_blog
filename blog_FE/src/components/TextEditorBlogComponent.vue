<template>
  <form @submit.prevent="submit">
    <div class="flex items-center justify-center h-screen">
      <div class="grid gap-4">
        <!-- Title Input Field -->
        <div class="mb-4">
          <label for="title" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">
            TITLE
          </label>
          <input
            type="text"
            id="title"
            v-model="editorTitle"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[100%] p-3.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Enter your title"
            required
          />
        </div>

        <!-- Text Editor Component -->
        <div class="mb-10">
          <label for="editor" class="block mb-2 text-xl font-medium text-gray-900 dark:text-white">
            TEXT EDITOR
          </label>
          <TextEditor v-model="editorContent" />
        </div>
        <!-- Submit Button -->
        <ButtonComponent 
          :disabled="!editorTitle || !editorContent" 
          buttonName="Save Changes" 
          color="sky" 
        />
      </div>
    </div>
  </form>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import TextEditor from '../components/TextEditor.vue';
import ButtonComponent from './ButtonComponent.vue';

// Define props passed from the parent component
const props = defineProps({
  title: String,
  body: String
});

// Define emits to send data back to the parent
const emit = defineEmits(['emitData']);

// Local state to handle form input
const editorTitle = ref('');
const editorContent = ref('');


// Initialize form fields with values from props
onMounted(() => {
  editorTitle.value = props.title;
  editorContent.value = props.body;
});

// Handle form submission
const submit = () => {
  emit('emitData', { title: editorTitle.value, content: editorContent.value });
};
</script>

