<script>
import { defineStore } from 'pinia'
import { onMounted, ref } from 'vue'
import axios from 'axios'
import moment from 'moment'

export const useBlogStore = defineStore('blog', () => {
  const blog = ref([])
  const currentBlogId = ref('/')

  async function getBlog(blogId) {
    try {
      const response = await axios.get(`http://127.0.0.1:8000/api/blogUser/${blogId}`)
      blog.value = response.data
      currentBlogId.value = blogId
    } catch (error) {
      console.error('Error occurred', error)
    }
  }

  function loadBlog(blogId) {
    getBlog(blogId)
  }

  onMounted(() => {
    // You can call the initial loadBlog with a default blog ID or leave it empty
    loadBlog(currentBlogId.value)
  })

  return {
    blog,
    moment,
    loadBlog,
    currentBlogId,
  }
})


</script>