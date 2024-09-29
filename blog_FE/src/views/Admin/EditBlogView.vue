<template>
  <div>
    <!-- Show loader if data is being fetched -->
    <div v-if="loading">Loading...</div>

    <!-- Show error message if fetching fails -->
    <div v-else-if="error">An error occurred while fetching the blog post.</div>

    <!-- Render the form (child component) when data is ready -->
    <div v-else>
      <TextEditorBlogComponent 
        :title="store.blogSinglePost.title" 
        :body="store.blogSinglePost.body" 
        @emitData="handleEditSubmit" 
      />
    </div>
  </div>
</template>

<script setup>
import TextEditorBlogComponent from '../../components/TextEditorBlogComponent.vue';
import { useBlogStore } from './../../stores/Blog';
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';

const store = useBlogStore();
const loading = ref(true);
const error = ref(false);

const route = useRoute();
const router = useRouter();

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

// Handle form submission for editing
const handleEditSubmit = async (updatedData) => {
  try {
    const blogId = route.params.id;
    await store.updateBlog(blogId, updatedData);
    router.push(`/blog/${blogId}`);  // Redirect to the blog post after successful update
  } catch (err) {
    console.error('Failed to update the blog post:', err);
  }
};
</script>
