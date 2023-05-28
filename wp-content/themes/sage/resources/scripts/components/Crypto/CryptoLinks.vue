<style lang="postcss" scoped>
ul {
  > li {
    > a {
      @apply text-slate-500 hover:text-primary inline-flex gap-x-1 text-sm;
    }
  }
}
</style>

<script lang="ts" setup>
import {computed, type PropType} from 'vue';
import type {TCoin} from '../../types/coins';
import Icon from '../Icon.vue';

const props = defineProps({
  coin: {
    type: Object as PropType<TCoin>,
    required: true,
  },
});

const homepage = computed(() => props.coin?.links?.homepage[0]);
</script>

<template>
  <div>
    <ul class="flex flex-wrap gap-4">
      <li v-if="homepage">
        <a :href="homepage" target="_blank">
          <Icon icon="external-link" />
          <span>Website</span>
        </a>
      </li>

      <li v-if="coin.links?.facebook_username">
        <a
          :href="`https://www.facebook.com/${coin.links?.facebook_username}`"
          target="_blank"
        >
          <Icon icon="facebook-circle" />
          <span>{{ coin.links?.facebook_username }}</span>
        </a>
      </li>

      <li v-if="coin.links?.twitter_screen_name">
        <a
          :href="`https://twitter.com/${coin.links?.twitter_screen_name}`"
          target="_blank"
        >
          <Icon icon="twitter" />
          <span>{{ coin.links?.twitter_screen_name }}</span>
        </a>
      </li>
    </ul>
  </div>
</template>
