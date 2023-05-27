<script lang="ts" setup>
import Icon from '@components/Icon.vue';
import {onMounted, ref, type Ref} from 'vue';
import type {TCoin} from '../../../types/coins';
import {useFetch} from '../../composables/fetch';
// import coin from './../../bitcoin.json';

const props = defineProps({
  coinId: {
    type: String,
    required: true,
  },
});

const loading = ref(false);

loading.value = true;

const coin = ref() as Ref<TCoin>;

onMounted(async () => {
  const {data, error} = await useFetch<TCoin>(`coins/${props.coinId}`);
  if (data.value) coin.value = data.value;
}),
  (loading.value = false);
</script>

<template>
  <div>
    <div class="fixed top-0 left-0 z-40 w-full h-full bg-black/50"></div>
    <div class="fixed top-0 left-0 z-50 w-full h-full flex-center">
      <div class="relative w-full max-w-3xl">
        <template v-if="coin">
          <button
            type="button"
            class="w-7 h-7 absolute -top-3.5 -right-3.5 z-10 rounded-full transition-colors bg-blue-700 hover:bg-blue-600 text-white flex-center"
          >
            <Icon icon="close" />
          </button>
          <div
            class="p-6 bg-white shadow-lg rounded-md w-full h-[22rem] overflow-y-scroll relative"
          >
            <header>
              <div class="flex items-center gap-2">
                <picture class="w-6 h-6 flex-center flex-none"
                  ><img class="max-w-full max-h-full" :src="coin.image?.small"
                /></picture>
                <h1 class="font-medium text-xl">{{ coin.name }}</h1>
              </div>
            </header>
          </div>
        </template>
        <template v-else>
          <div>Err</div>
        </template>
      </div>
    </div>
  </div>
</template>
