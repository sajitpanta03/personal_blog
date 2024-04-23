<script setup>
import TheRegister from '../components/TheRegister.vue';
</script>

<template>
  <main>
    <div class="register">
     <TheRegister />
    </div>
  </main>
</template>


<style>
@media only screen and (min-width: 1022px) {
  .register {
    margin-left: -200px;
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>