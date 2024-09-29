<template>
  <TextEditorBlogComponent @emitData="handleSubmit" />
</template>

<script setup>
import axios from 'axios'
import { useRouter } from 'vue-router'
import TextEditorBlogComponent from '../../components/TextEditorBlogComponent.vue';

const router = useRouter()

const handleSubmit = async (formData) => {
  try {
    const token = localStorage.getItem('authToken')

    if (!token) {
      alert('User not authenticated. Please log in.')
      return
    }

    const response = await axios.post(
      `${import.meta.env.VITE_API_URL}/api/admin/blog`,
      {
        title: formData.title,        
        body: formData.content      
      },
      {
        headers: {
          Authorization: `Bearer ${token}`
        }
      }
    );

    if (response.status === 201 || response.status === 200) {
      alert('Blog created successfully!');
      router.push({path: '/adminBlog'});
    } else {
      alert('Sorry Blog was not created');
    }
  } catch (error) {
    console.error(error)
    alert('Failed to create blog')
  }
}
</script>
