<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
      <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
        <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl dark:text-white">
          Our Blog
        </h2>
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
          We use an agile approach to test assumptions and connect with the needs of your audience
          early and often.
        </p>
      </div>
      <div class="grid gap-8 lg:grid-cols-2">
        <article v-for="blogPost in store.blog" :key="blogPost.id"
          class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
          <div class="mb-5 text-gray-500">
            <span class="text-sm">{{
              store.moment(blogPost.created_at).format('YYYY-MM-DD')
              }}</span>
          </div>

          <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            <RouterLink :to="/blog/ + blogPost.id">{{ blogPost.title }}</RouterLink>
          </h2>
          <RouterLink :to="/blog/ + blogPost.id">
            <p class="mb-5 font-light text-gray-500 dark:text-gray-400" v-html="blogPost.body"></p>
          </RouterLink>
          <div class="flex items-center justify-between">
            <RouterLink :to="'/blog/' + blogPost.id" @click="() => store.getSingleBlog(blogPost.id)"
              class="inline-flex items-center font-medium text-sky-200 dark:text-primary-500 hover:underline">
              Read more
              <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
              </svg>
            </RouterLink>
          </div>
        </article>
      </div>
    </div>
  </section>
</template>

<script setup>
import { useBlogStore } from '@/stores/Blog'

const store = useBlogStore()

</script>
