<template>
  <button
    :class="`bg-${props.color}-500 h-[60px] rounded-md w-40 hover:bg-sky-600 shadow-md transition-all duration-300 ease-in-out text-white font-semibold text-lg`"
  >
    {{ props.buttonName }}
  </button>
</template>

<script setup>
const props = defineProps({
  buttonName: String,
  color: String
})
</script>
