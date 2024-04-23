<template>
  <div class="mt-[60px] space-y-5 p-5">
    <AlertComponent
      :show="showAlert"
      :on-dismiss="() => (showAlert = false)"
      title="This is my awesome Alert"
    >
      <p>Some important message</p>
    </AlertComponent>
  </div>
</template>

<script setup>
import AlertComponent from '@/components/AlertComponent.vue'
import { ref } from 'vue'

const showAlert = ref(true)
</script>
