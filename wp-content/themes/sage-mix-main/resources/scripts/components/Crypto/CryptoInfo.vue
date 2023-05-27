<script lang="ts" setup>
import {computed} from 'vue';

const props = defineProps({
  coin: {
    type: Object,
    required: true,
  },
});

const info = computed(() => {
  const data = [
    {
      label: 'Market Cap Rank',
      value: props.coin.market_cap_rank,
    },
    {
      label: 'Current Price',
      value: `$${props.coin?.market_data?.current_price?.usd}`,
    },
    {
      label: 'Total Supply',
      value: props.coin?.market_data?.total_supply,
    },
    {
      label: 'Max Supply',
      value: props.coin?.market_data?.max_supply,
    },
  ];

  return data.filter((d) => d.value);
});

const percentage = computed(() => {
  const low_price = props.coin?.market_data?.low_24h?.usd;
  const high_price = props.coin?.market_data?.high_24h?.usd;

  const current_price = props.coin?.market_data?.current_price?.usd;

  const price_range = high_price - low_price;
  const current_range = current_price - low_price;

  return ((current_range / price_range) * 100).toFixed(2);
});
</script>
<template>
  <main v-if="coin" class="mt-6 space-y-10">
    <div class="space-y-3">
      <div class="overflow-hidden bg-slate-200 w-full h-2.5 rounded-full">
        <div
          class="h-full bg-gradient-to-r from-purple-500 to-emerald-400"
          :style="{width: `${percentage}%`}"
        ></div>
      </div>
      <div class="flex justify-between gap-6">
        <div>
          <span>{{ `$${props.coin?.market_data?.low_24h?.usd}` }}</span>
        </div>
        <div>
          <span>{{ `$${props.coin?.market_data?.high_24h?.usd}` }}</span>
        </div>
      </div>
    </div>

    <div>
      <ul class="columns-2 gap-8 -mt-2">
        <li v-for="i in info" class="flex gap-10 border-b py-2 justify-between">
          <div>
            <h2 class="text-sm text-slate-500">{{ i.label }}</h2>
          </div>
          <div>
            <span class="text-sm">{{ i.value }}</span>
          </div>
        </li>
      </ul>
    </div>
  </main>
</template>
