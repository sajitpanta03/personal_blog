import { defineStore } from 'pinia'
import { onMounted, ref } from 'vue'
import axios from 'axios'
import moment from 'moment'

export const useBlogStore = defineStore('blog', () => {
  // State
  const blog = ref([])
  const blogSinglePost = ref([])

  // Actions
  async function getBlog() {
    try {
      const response = await axios.get(`${import.meta.env.VITE_API_URL}/api/blogUser`)
      blog.value = response.data
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  async function getSingleBlog(blogId) {
    try {
      const response = await axios.get(`${import.meta.env.VITE_API_URL}/api/blogUser/${blogId}`)
      blogSinglePost.value = response.data
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  async function getAdminBlog() {
    try {
      const token = getToken()
      const response = await axios.get(`${import.meta.env.VITE_API_URL}/api/admin/blog`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
      return blog.value = response.data
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  function removeBlogPost(id) {
    const blog = blog.filter(blogPost => blogPost.id !== id);
    return blog;
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
    removeBlogPost,
    moment,
    getSingleBlog,
    getAdminBlog
  }
})
