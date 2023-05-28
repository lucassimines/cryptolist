<script lang="ts" setup>
import type { PropType } from 'vue';
import Icon from './Icon.vue';

defineProps({
  text: {
    type: String,
    required: true
  },
  type: {
    type: String as PropType<'default' | 'danger'>,
    default: 'default'
  }
});
</script>

<template>
  <div>
    <div
      class="px-4 py-3 space-x-3 rounded-md text-center"
      :class="type === 'default' ? 'bg-slate-100' : 'bg-red-400 text-white'"
    >
      <Icon :icon="type === 'default' ? 'arrow-right-s' : 'alert'" />
      <span>{{ text }}</span>
    </div>
  </div>
</template>
