<template>
  <transition leave-active-class="duration-300" leave-to-class="opacity-0">
    <div v-if="props.show" :class="containerClass">
      <div class="shrink-0">
        <component :is="iconComponent" :class="iconClass" />
      </div>
      <div class="w-[300px] space-y-2">
        <h2 :class="titleClass">
          {{ props.title }}
        </h2>
        <div :class="contentClass">
          <slot />
        </div>
      </div>
      <div class="shrink-0">
        <button @click="props.onDismiss" :class="closeButtonClass">
          <XMarkIcon class="w-6 h-6" />
        </button>
      </div>
    </div>
  </transition>
</template>

<script setup>
import {
  InformationCircleIcon,
  XMarkIcon,
  CheckCircleIcon,
  ExclamationTriangleIcon,
  XCircleIcon
} from '@heroicons/vue/20/solid'
import { computed } from 'vue'
import { cva } from 'class-variance-authority'

const props = defineProps({
  intent: {
    type: String,
    validator(value) {
      return ['info', 'success', 'warning', 'danger'].includes(value)
    },
    default: 'info'
  },
  title: String,
  show: {
    type: Boolean,
    default: true
  },
  onDismiss: Function
})

const containerClass = computed(() => {
  return cva('flex p-4 rounded-md space-x-3', {
    variants: {
      intent: {
        info: 'bg-blue-100',
        success: 'bg-green-200',
        warning: 'bg-orange-200',
        danger: 'bg-red-300'
      }
    }
  })({
    intent: props.intent
  })
})

const iconClass = computed(() => {
  return cva('w-6 h-6', {
    variants: {
      intent: {
        info: 'text-blue-700',
        success: 'text-green-600',
        warning: 'text-orange-500',
        danger: 'text-red-500'
      }
    }
  })({
    intent: props.intent
  })
})

const titleClass = computed(() => {
  return cva('font-medium', {
    variants: {
      intent: {
        info: 'text-blue-900',
        success: 'text-green-900',
        warning: 'text-orange-900',
        danger: 'text-red-900'
      }
    }
  })({
    intent: props.intent
  })
})

const contentClass = computed(() => {
  return cva('text-sm', {
    variants: {
      intent: {
        info: 'text-blue-800',
        success: 'text-green-800',
        warning: 'text-orange-800',
        danger: 'text-red-800'
      }
    }
  })({
    intent: props.intent
  })
})

const closeButtonClass = computed(() => {
  return cva('p-0.5 rounded-md -m-1', {
    variants: {
      intent: {
        info: 'text-blue-900/70 hover:text-blue-900 hover:bg-blue-200',
        success: 'text-green-900/70 hover:text-green-600 hover:bg-green-300',
        warning: 'text-orange-900/70 hover:text-orange-600 hover:bg-orange-300',
        danger: 'text-red-900/70 hover:text-red-200 hover:bg-red-400'
      }
    }
  })({
    intent: props.intent
  })
})

const iconComponent = computed(() => {
  const icons = {
    success: CheckCircleIcon,
    warning: ExclamationTriangleIcon,
    danger: XCircleIcon,
    info: InformationCircleIcon
  }
  return icons[props.intent]
})
</script>
