<script lang="ts" setup>
import { ref, watch, type PropType, type Ref } from 'vue';
import type { TCoin } from '../types/coins';
import Icon from './Icon.vue';

const props = defineProps({
  items: {
    type: Object as PropType<TCoin[]>,
    required: true
  }
});

const term = ref('');

const emit = defineEmits(['filter']);

const filterableColumnKeys = ['name', 'symbol'];

const filteredItems = ref() as Ref<TCoin[]>;

const filter = (term: string) => {
  // Filters the items by name
  filteredItems.value = props.items.filter((i) => {
    // Filter by given colum keys
    return filterableColumnKeys.some((key) => {
      const itemKey = i[key];
      // Use toLowerCase() to prevent the item from being missed if the filter term has a different case.
      return itemKey.toLowerCase().includes(term?.toLowerCase());
    });
  });
};

watch(term, (t) => {
  filter(t);
  // Emit filter value to listen on parent component
  emit('filter', filteredItems.value);
});
</script>

<template>
  <div class="mb-6 relative w-72 mobile-max:w-full">
    <input
      type="text"
      class="border w-full h-11 px-3 outline-none transition-colors rounded pr-9 focus:bg-slate-50 focus:border-slate-300"
      placeholder="Filter by name or symbol"
      v-model="term"
    />

    <div class="absolute top-0 right-3 h-full flex items-center justify-end">
      <Icon
        v-if="!term"
        icon="search"
        :class="`transition-colors ${term.length ? 'text-primary' : 'text-slate-400'}`"
      />
      <button type="button" @click="term = ''" v-else>
        <Icon icon="close" class="transition-colors text-primary hover:text-primary-dark" />
      </button>
    </div>
  </div>
</template>
