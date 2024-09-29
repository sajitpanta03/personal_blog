<template>
  <section class="bg-white dark:bg-gray-900">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
      <div class="max-w-screen-sm mx-auto mb-8 text-center lg:mb-16">
        <h2
          class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl dark:text-white"
        >
          Our Blog
        </h2>
        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">
          We use an agile approach to test assumptions and connect with the needs of your audience
          early and often.
        </p>
        <br /><br />
        <router-link to="/createBlog">
          <button
            class="bg-sky-500 h-[60px] rounded-md w-40 hover:bg-sky-600 shadow-md transition-all duration-300 ease-in-out text-white font-semibold text-lg"
          >
            Create Blog
          </button></router-link
        >
      </div>
      <div class="grid gap-8 lg:grid-cols-2">
        <article
          v-for="blogPost in store.blog"
          :key="blogPost.id"
          class="p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
        >
          <div class="mb-5 text-gray-500">
            <span class="text-sm">{{ blogPost.created_at }}</span>
          </div>
          <div class="flex items-center justify-between">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
              <a :href="'#' + blogPost.id">{{ blogPost.title }}</a>
            </h2>
            <div class="grid space-y-2">
              <button
                :key="blogPost.id"
                @click="deleteBlogPost(blogPost.id)"
                class="p-1 text-sm text-center text-white transition-all border border-transparent rounded-md shadow-sm boarder-none bg-slate-800 hover:bg-red-900 focus:bg-slate-700 focus:shadow-none active:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  width="30"
                  height="30"
                  viewBox="0 0 30 30"
                >
                  <path
                    d="M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z"
                  ></path>
                </svg>
              </button>
              <button
                :key="blogPost.id"
                @click="gotoEdit(blogPost.id)"
                class="p-1 text-sm text-center text-white transition-all border border-transparent rounded-md shadow-sm boarder-none bg-slate-800 hover:bg-sky-200 focus:bg-slate-700 focus:shadow-none active:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  x="0px"
                  y="0px"
                  width="30"
                  height="30"
                  viewBox="0 0 64 64"
                >
                  <linearGradient
                    id="0O0q6J4HBgQKyT39nvTa~a_56304_gr1"
                    x1="46.807"
                    x2="46.807"
                    y1="9.849"
                    y2="24.215"
                    gradientUnits="userSpaceOnUse"
                    spreadMethod="reflect"
                  >
                    <stop offset="0" stop-color="#6dc7ff"></stop>
                    <stop offset="1" stop-color="#e6abff"></stop>
                  </linearGradient>
                  <path
                    fill="url(#0O0q6J4HBgQKyT39nvTa~a_56304_gr1)"
                    d="M49.482,24.392l-9.874-9.874l4.232-4.232c0.39-0.39,1.021-0.39,1.411,0l8.464,8.464 c0.39,0.39,0.39,1.021,0,1.411L49.482,24.392z"
                  ></path>
                  <linearGradient
                    id="0O0q6J4HBgQKyT39nvTa~b_56304_gr2"
                    x1="32"
                    x2="32"
                    y1="8.084"
                    y2="55.83"
                    gradientUnits="userSpaceOnUse"
                    spreadMethod="reflect"
                  >
                    <stop offset="0" stop-color="#1a6dff"></stop>
                    <stop offset="1" stop-color="#c822ff"></stop>
                  </linearGradient>
                  <path
                    fill="url(#0O0q6J4HBgQKyT39nvTa~b_56304_gr2)"
                    d="M50.697,25.999l4.428-4.428c1.167-1.167,1.167-3.065,0-4.232l-8.464-8.464 c-1.167-1.167-3.065-1.167-4.232,0l-4.428,4.428c-0.664-0.175-1.4-0.011-1.92,0.509l-1.411,1.411c-0.52,0.52-0.684,1.256-0.509,1.92 L11.198,40.106l-0.508,0.508l-0.2,0.2l-2.373,9.967c-0.343,1.442,0.078,2.928,1.126,3.976s2.534,1.469,3.976,1.125l9.967-2.373 l0.2-0.2l0.508-0.508l22.964-22.964c0.664,0.175,1.4,0.011,1.92-0.509l1.411-1.411C50.708,27.399,50.872,26.663,50.697,25.999z M47.367,27.92L36.081,16.634l1.411-1.411l11.285,11.285L47.367,27.92z M23.46,50.414c-0.28-1.063-0.682-2.077-1.198-3.034 l20.872-20.872l2.116,2.116L23.46,50.414z M14.916,53.428c-0.12-1.074-0.58-2.115-1.405-2.939c-0.825-0.825-1.865-1.285-2.939-1.405 l0.698-2.931c1.649,0.266,3.173,1.036,4.357,2.22c1.184,1.184,1.954,2.709,2.22,4.357L14.916,53.428z M17.038,46.962 c-1.447-1.447-3.301-2.396-5.306-2.75l0.463-1.943c2.382,0.441,4.533,1.562,6.254,3.282s2.841,3.872,3.282,6.254l-1.943,0.463 C19.433,50.263,18.485,48.409,17.038,46.962z M19.859,44.141c-0.477-0.477-0.987-0.907-1.517-1.304l20.561-20.561l2.821,2.821 L21.163,45.658C20.766,45.128,20.336,44.618,19.859,44.141z M16.62,41.738c-0.957-0.516-1.971-0.918-3.034-1.198l21.79-21.79 l2.116,2.116L16.62,41.738z M43.84,10.286c0.389-0.389,1.022-0.389,1.411,0l8.464,8.464c0.389,0.389,0.389,1.022,0,1.411 l-4.232,4.232l-9.874-9.874L43.84,10.286z"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
          <p class="mb-5 font-light text-gray-500 dark:text-gray-400" v-html="blogPost.body"></p>
          <div class="flex items-center justify-between">
            <a
              :href="'/blog/' + blogPost.id"
              class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline"
            >
              Read more
              <svg
                class="w-4 h-4 ml-2"
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
import axios from 'axios'
import { onMounted } from 'vue'
import { useRouter } from 'vue-router';

const store = useBlogStore()
const router = useRouter();

const deleteBlogPost = async (id) => {
  try {
    const token = localStorage.getItem('authToken')
    await axios.delete(`${import.meta.env.VITE_API_URL}/api/admin/blog/${id}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    })
    window.location.reload()
    alert('Blog delete success')
  } catch (error) {
    console.error(error)
    alert('Failed to delete blog')
  }
}


const gotoEdit = (id) => {
  router.push('/editBlog/' + id)
}

onMounted(() => {
  store.getAdminBlog()
})
</script>
