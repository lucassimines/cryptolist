<script lang="ts" setup>
import type {PropType} from 'vue';

defineProps({
  text: {
    type: String,
    required: true,
  },
  type: {
    type: String as PropType<'default' | 'error'>,
    default: 'default',
  },
});
</script>

<template>
  <div>
    <div
      class="p-6 rounded-md text-center"
      :class="type === 'default' ? 'bg-slate-100' : 'bg-red-200'"
    >
      {{ text }}
    </div>
  </div>
</template>
