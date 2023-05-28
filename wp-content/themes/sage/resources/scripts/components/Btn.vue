<script lang="ts" setup>
import Icon from './Icon.vue';

defineProps({
  text: {
    type: String,
    required: true
  },
  loading: {
    type: Boolean
  }
});
</script>

<template>
  <button type="button" class="p-2 h-10 rounded transition-colors bg-slate-200 hover:bg-slate-300">
    <span v-if="!loading">{{ text }}</span>
    <div class="flex items-center gap-2" v-else>
      <div class="flex-center w-4 h-4">
        <Icon icon="loader" class="flex-none leading-none animate-spin-slow block" />
      </div>

      <span>Loading...</span>
    </div>
  </button>
</template>
