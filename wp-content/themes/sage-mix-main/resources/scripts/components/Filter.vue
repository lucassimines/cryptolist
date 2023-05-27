<script lang="ts" setup>
import { ref } from 'vue';
import Icon from './Icon.vue';

const term = ref('');

const emit = defineEmits(['filter']);

const filterOnInput = (v: Event) => {
  emit('filter', v);
};
</script>

<template>
  <div class="mb-6 relative w-72">
    <input
      type="text"
      class="border w-full h-11 px-3 outline-none transition-colors rounded pr-9 focus:bg-slate-50 focus:border-slate-300"
      placeholder="Filter"
      @input="filterOnInput"
      v-model="term" />

    <div class="absolute top-0 right-3 h-full flex items-center justify-end">
      <Icon
        icon="search"
        :class="`transition-colors ${term.length ? 'text-emerald-400' : 'text-slate-400'}`" />
    </div>
  </div>
</template>
