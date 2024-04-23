import { defineStore } from 'pinia'
import { onMounted, ref } from 'vue'
import axios from 'axios'
import moment from 'moment'
import config from '../config'

export const useBlogStore = defineStore('blog', () => {
  // State
  const blog = ref([])
  const blogSinglePost = ref([])

  // Actions
  async function getBlog() {
    try {
      const response = await axios.get(`${config.API}/blogUser`)
      blog.value = response.data
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  async function getSingleBlog(blogId) {
    try {
      const response = await axios.get(`${config.API}/blogUser/${blogId}`)
      blogSinglePost.value = response.data
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  async function getAdminBlog() {
    try {
      const token = getToken()
      const response = await axios.get(`${config.API}/admin/blog`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
      blog.value = response.data
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  function getToken() {
    return localStorage.getItem('authToken')
  }

  onMounted(() => {
    getBlog()
  })

  return {
    blog,
    getToken,
    blogSinglePost,
    moment,
    getSingleBlog,
    getAdminBlog
  }
})
