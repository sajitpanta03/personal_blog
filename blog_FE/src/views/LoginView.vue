<script setup>
import TheLogin from '../components/TheLogin.vue';
</script>

<template>
    <main>
      <div class="login">
        <TheLogin />
      </div>
    </main>
</template>

<style>
@media only screen and (min-width: 1022px) {
  .login {
    margin-left: -200px;
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>

