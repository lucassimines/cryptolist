<script lang="ts" setup>
import { computed, type PropType } from 'vue';
import type { TCoin } from '../../types/coins';
import { USDollar, USNumber } from '../../utils/format';
import CryptoLinks from './CryptoLinks.vue';

// Require coin object as props
const props = defineProps({
  coin: {
    type: Object as PropType<TCoin>,
    required: true
  }
});

interface InfoItem {
  label: string;
  value: string | number;
}

// Create info data list
const info = computed(() => {
  const data: InfoItem[] = [
    {
      label: 'Market Cap Rank',
      value: USNumber.format(props.coin.market_cap_rank)
    },
    {
      label: 'Current Price',
      value: USDollar.format(props.coin?.market_data?.current_price?.usd)
    },
    {
      label: 'Total Supply',
      value: USNumber.format(props.coin?.market_data?.total_supply)
    },
    {
      label: 'Max Supply',
      value: USNumber.format(props.coin?.market_data?.max_supply)
    },
    {
      label: 'Watchlist Users',
      value: USNumber.format(props.coin?.watchlist_portfolio_users)
    },
    {
      label: 'CoinGecko Score',
      value: props.coin?.coingecko_score
    },
    {
      label: 'Public Interest Score',
      value: props.coin?.public_interest_score
    },
    {
      label: 'Hashing Algorithm',
      value: props.coin?.hashing_algorithm
    }
  ];

  // Filter the list checking if value exists
  return data.filter((d) => d.value);
});

const percentage = computed(() => {
  const low = props.coin?.market_data?.low_24h?.usd;
  const high = props.coin?.market_data?.high_24h?.usd;

  const currentPrice = props.coin?.market_data?.current_price?.usd;

  // Get the price range
  const priceRange = high - low;
  // Get the current range
  const currentRange = currentPrice - low;

  // Calculate the percentage
  return ((currentRange / priceRange) * 100).toFixed(2);
});
</script>
<template>
  <div v-if="coin" class="mt-6 space-y-10 mobile-max:space-y-6">
    <header class="space-y-3">
      <div class="overflow-hidden bg-slate-200 w-full h-2.5 rounded-full">
        <div
          class="h-full bg-gradient-to-r from-purple-500 to-emerald-400"
          :style="{ width: `${percentage}%` }"
        ></div>
      </div>
      <div class="flex justify-between gap-6">
        <div>
          <span>{{ USDollar.format(props.coin?.market_data?.low_24h?.usd) }}</span>
        </div>
        <div>
          <span>{{ USDollar.format(props.coin?.market_data?.high_24h?.usd) }}</span>
        </div>
      </div>
    </header>

    <main>
      <ul class="md:columns-2 gap-8 -mt-2">
        <li v-for="i in info" class="flex gap-10 border-b py-2 justify-between">
          <div>
            <h2 class="text-sm text-slate-500">{{ i.label }}</h2>
          </div>
          <div>
            <span class="text-sm">{{ i.value }}</span>
          </div>
        </li>
      </ul>
    </main>

    <footer>
      <CryptoLinks :coin="coin" />
    </footer>
  </div>
</template>
