<script lang="ts" setup>
import {onMounted, ref, type PropType, type Ref} from 'vue';
import {useFetch} from '../../composables/fetch';
import type {TCoin} from '../../types/coins';
import Alert from '../Alert.vue';
import jsonCoin from './../../bitcoin.json';
import Icon from './../Icon.vue';
import CryptoInfo from './CryptoInfo.vue';

const props = defineProps({
  coinId: {
    type: String as PropType<TCoin['id']>,
    required: true,
  },
});

const emit = defineEmits(['close']);

const loading = ref(false);

loading.value = false;

const coin = ref() as Ref<TCoin>;
const jsonTest = true;
const fetchError = ref();

onMounted(async () => {
  const {data, error} = await useFetch<TCoin>(`coins/${props.coinId}`);
  if (data.value) coin.value = data.value;
  if (jsonTest) data.value = jsonCoin;
  if (error.value) fetchError.value = error.value;
}),
  (loading.value = false);

const closeModal = () => emit('close');
</script>

<template>
  <div class="fixed top-0 left-0 z-50 w-full h-full flex-center p-5">
    <div class="relative w-full max-w-2xl">
      <button
        type="button"
        @click="closeModal()"
        class="w-7 h-7 absolute -top-3.5 -right-3.5 z-10 rounded-full transition-colors bg-blue-700 hover:bg-blue-600 text-white flex-center"
      >
        <Icon icon="close" />
      </button>

      <div
        class="p-6 bg-white shadow-lg rounded-md w-full h-full max-h-[22rem] mobile-max:max-h-[75vh] overflow-auto relative"
      >
        <template v-if="coin">
          <header>
            <div class="flex items-center gap-2">
              <picture class="w-6 h-6 flex-center flex-none"
                ><img class="max-w-full max-h-full" :src="coin.image?.small"
              /></picture>
              <h1 class="font-medium text-xl">{{ coin.name }}</h1>
            </div>
          </header>

          <CryptoInfo :coin="coin" />
        </template>

        <template v-else-if="fetchError">
          <Alert text="Failed to fetch Crypto info" type="error" />
        </template>

        <template v-else>
          <Alert text="Loading..." />
        </template>
      </div>
    </div>
  </div>
</template>
