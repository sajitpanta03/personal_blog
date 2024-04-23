<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <AlertComponent />
      <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
        <h2
          class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"
        >
          Our Blog
        </h2>
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
          We use an agile approach to test assumptions and connect with the needs of your audience
          early and often.
        </p>
      </div>
      <div class="grid gap-8 lg:grid-cols-2">
        <article
          v-for="blogPost in store.blog"
          :key="blogPost.id"
          class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
        >
          <div class="mb-5 text-gray-500">
            <span class="text-sm">{{ blogPost.created_at }}</span>
          </div>

          <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <a :href="'#' + blogPost.id">{{ blogPost.title }}</a>
          </h2>
          <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ blogPost.body }}</p>
          <div class="flex justify-between items-center">
            <a
              :href="'/blog/' + blogPost.id"
              class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline"
            >
              Read more
              <svg
                class="ml-2 w-4 h-4"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </a>
          </div>
        </article>
      </div>
    </div>
  </section>
</template>

<script setup>
import { useBlogStore } from '@/stores/Blog'
import { onMounted } from 'vue'
import AlertComponent from '@/components/AlertComponent.vue'

const store = useBlogStore()

onMounted(() => {
  store.getAdminBlog()
})
</script>
