<template>
  <main>
    <div class="adminBlog">
      <AdminBlog />
    </div>
  </main>
</template>

<script setup>
import AdminBlog from '@/components/Admin/AdminBlog.vue'
</script>

<style scoped>
@media only screen and (min-width: 1022px) {
  .adminBlog {
    margin-left: -500px;
    min-height: 100vh;
  }
}
</style>
