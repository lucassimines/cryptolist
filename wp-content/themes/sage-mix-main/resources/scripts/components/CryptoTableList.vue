<script lang="ts" setup>
import orderBy from 'lodash-es/orderBy';
import {ref} from 'vue';
import {SortDirection, TableColumns} from './../../types/table';
import top10crypto from './../top10crypto.json';
// import { useFetch } from '../composables/fetch';
import Alert from './Alert.vue';
import Filter from './Filter.vue';
import Icon from './Icon.vue';

const loading = ref(false);

const fetchCryptos = async () => {
  loading.value = true;

  // const { data, error } = await useFetch(
  //   'coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false&locale=en'
  // );

  loading.value = false;

  // return { data, error };
};

interface coins {
  name: string;
  symbol: string;
  [key: string]: any;
}

// const { data: fetchedItems, error } = await fetchCryptos();
const fetchedItems = ref(top10crypto as coins[]);
const filteredItems = ref(fetchedItems.value);
const visibleItems = ref(fetchedItems.value);

const sort = ref({
  direction: SortDirection.Default,
  key: '',
  icon: 'arrow-up-down',
  count: 0,
});

const sortBy = (col: string) => {
  // Sorts the list based on a specific column referenced by an object key obtained from the API.

  const oldSortKey = sort.value.key;

  sort.value.key = col;

  // Detect whether the sort key has changed and, if so, reset sort object values
  if (oldSortKey !== sort.value.key)
    (sort.value.direction = SortDirection.Asc), (sort.value.count = 0);

  // Reset the count to the default value if the user has clicked more than twice
  if (sort.value.count > 2) sort.value.count = 0;

  switch (sort.value.count) {
    case 0:
      sort.value.direction = SortDirection.Asc;
      sort.value.icon = 'arrow-up';
      break;
    case 1:
      sort.value.direction = SortDirection.Desc;
      sort.value.icon = 'arrow-down';
      break;
    case 2:
      sort.value.direction = SortDirection.Default;
      sort.value.icon = 'arrow-up-down';
      break;
  }

  // If the sort has a direction, order the visible items. If not, load the filteredItems instead
  const ordered = sort.value.direction
    ? orderBy(visibleItems.value, col, [sort.value.direction])
    : filteredItems.value;

  visibleItems.value = ordered;

  // Sum 1 to the sort count value
  sort.value.count++;
};

const filterableColumnKeys = ['name', 'symbol'];

const filter = (e: Event) => {
  const target = e.target as HTMLInputElement;

  // Filters the items by name
  filteredItems.value = visibleItems.value = fetchedItems.value.filter((s) => {
    // Filter by given colum keys
    return filterableColumnKeys.some((key) => {
      // It's good to use toLowerCase() to prevent the item from being missed if the filter term has a different case.
      const temp = s[key as keyof coins];
      return temp.toLowerCase().includes(target.value?.toLowerCase());
    });
  });
};
</script>

<template>
  <section className="px-main py-20">
    <!-- <CryptoInfoModal /> -->

    <div className="max-w-main mx-auto">
      <div v-if="fetchedItems?.length">
        <Filter @filter="filter" />

        <table class="w-full" v-if="visibleItems?.length">
          <thead>
            <tr
              class="[&>td]:border-t [&>td]:py-4 [&>td]:whitespace-nowrap [&>td]:text-sm [&>td]:text-slate-500"
            >
              <td>
                <span>#</span>
              </td>
              <td v-for="col in TableColumns">
                <button
                  @click="sortBy(col.name)"
                  type="button"
                  class="inline-flex gap-2 group"
                >
                  <span>{{ col.label }}</span>
                  <Icon
                    :icon="sort.key === col.name ? sort.icon : 'arrow-up-down'"
                    :class="[
                      'transition-colors text-slate-400 group-hover:text-emerald-500',
                      {
                        'text-emerald-400':
                          sort.direction && sort.key === col.name,
                      },
                    ]"
                  />
                </button>
              </td>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="(c, k) in visibleItems"
              class="[&>td]:border-t [&>td]:py-4 [&>td]:whitespace-nowrap"
            >
              <td>{{ k + 1 }}</td>
              <td>
                <div class="flex items-center gap-4">
                  <picture class="w-6 h-6 flex-center flex-none"
                    ><img class="max-w-full max-h-full" :src="c.image"
                  /></picture>
                  <div>{{ c.name }}</div>
                  <div class="text-slate-500 uppercase text-sm">
                    {{ c.symbol }}
                  </div>
                </div>
              </td>
              <td>
                <span>{{ c.low_24h }}</span>
              </td>
              <td>
                <span>{{ c.high_24h }}</span>
              </td>
            </tr>
          </tbody>
        </table>

        <div v-else>
          <Alert text="No cryptocurrencies were found" />
        </div>
      </div>

      <!-- <div v-else-if="error" class="space-y-6 flex flex-col items-center">
        <Alert text="Failed to fetch Cryptocurrencies API" type="error" />
        <button
          type="button"
          @click="fetchCryptos()"
          class="p-2 h-10 rounded transition-colors bg-slate-200 hover:bg-slate-300">
          <span v-if="!loading">Reload Cryptocurrencies</span>
          <Icon v-else icon="loader-5" class="animate-spin-slow inline-block" />
        </button>
      </div> -->
    </div>
  </section>
</template>
