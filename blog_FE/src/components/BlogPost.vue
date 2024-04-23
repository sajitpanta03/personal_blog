<template>
  <div>
    <div v-if="store.blogSinglePost">
      <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
          <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
            <h2
              class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
            >
              {{ store.blogSinglePost.title }}
            </h2>
          </div>
          <div class="grid gap-8 lg:grid-cols-1">
            <article
              class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
            >
              <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ store.blogSinglePost.body }}</p>
            </article>
          </div>
        </div>
      </section>
    </div>

    <div v-if="loading">Loading...</div>

    <div v-if="error">Error loading blog.</div>
  </div>
</template>

<script setup>
import { useBlogStore } from '../stores/Blog';
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const store = useBlogStore();
const loading = ref(true);
const error = ref(false);

const route = useRoute();

onMounted(async () => {
  try {
    const blogId = route.params.id;
    await store.getSingleBlog(blogId);
    loading.value = false;
  } catch (err) {
    console.error(err);
    error.value = true;
  }
});
</script>
