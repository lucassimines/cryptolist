<script lang="ts" setup>
import {ref, watch} from 'vue';
import Icon from './Icon.vue';

const term = ref('');

const emit = defineEmits(['filter']);

watch(term, (t) => {
  emit('filter', t);
});
</script>

<template>
  <div class="mb-6 relative w-72 mobile-max:w-full">
    <input
      type="text"
      class="border w-full h-11 px-3 outline-none transition-colors rounded pr-9 focus:bg-slate-50 focus:border-slate-300"
      placeholder="Filter"
      v-model="term"
    />

    <div class="absolute top-0 right-3 h-full flex items-center justify-end">
      <Icon
        v-if="!term"
        icon="search"
        :class="`transition-colors ${
          term.length ? 'text-primary' : 'text-slate-400'
        }`"
      />
      <button type="button" @click="term = ''" v-else>
        <Icon
          icon="close"
          class="transition-colors text-primary hover:text-primary-dark"
        />
      </button>
    </div>
  </div>
</template>
