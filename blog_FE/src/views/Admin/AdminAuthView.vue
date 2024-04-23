<template>
  <main>
    <div class="adminAuth">
    <AdminAuth />
    </div>
  </main>
</template>
<script setup>
import AdminAuth from "@/components/Admin/AdminAuth.vue";
</script>

<style>
@media only screen and (min-width: 1022px) {
  .adminAuth {
    margin-left: -150px;
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>