<script lang="ts" setup>
import { ref } from 'vue';
// import { useFetch } from '../composables/fetch';
import coin from './../bitcoin.json';
import Icon from './Icon.vue';

const props = defineProps({
  coinId: {
    type: String,
    required: true,
    default: 'bitcoin'
  }
});

const loading = ref(false);

loading.value = true;

// const { data:coin, error } = await useFetch(`coins/${props.coinId}`);

loading.value = false;
</script>

<template>
  <div>
    <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50"></div>
    <div class="fixed top-0 left-0 z-50 w-full h-full flex-center">
      <div class="relative w-full max-w-3xl">
        <button
          type="button"
          class="w-7 h-7 absolute -top-3.5 -right-3.5 z-10 rounded-full transition-colors bg-blue-700 hover:bg-blue-600 text-white flex-center">
          <Icon icon="close" />
        </button>
        <div class="p-6 bg-white shadow-lg rounded-md w-full h-[22rem] overflow-y-scroll relative">
          <header>
            <div class="flex items-center gap-2">
              <picture class="w-6 h-6 flex-center flex-none"
                ><img class="max-w-full max-h-full" :src="coin.image?.small"
              /></picture>
              <h1 class="font-medium text-xl">{{ coin.name }}</h1>
            </div>
          </header>
        </div>
      </div>
    </div>
  </div>
</template>
