<script lang="ts" setup>
import {defineAsyncComponent} from 'vue';
import CryptoTableList from './components/CryptoTableList.vue';

const AsyncComponent = defineAsyncComponent({
  loader: () => import('./components/CryptoTableList.vue'),
});
</script>

<template>
  <div>
    <!-- <AsyncComponent /> -->
    <CryptoTableList />
  </div>
</template>
