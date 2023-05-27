<script lang="ts" setup>
defineProps({
  coin: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <main v-if="coin">
    <ul>
      <li>
        <div><h2>Market Cap</h2></div>
        <div>
          <span>{{ coin.market_cap_desc }}</span>
        </div>
      </li>
    </ul>
  </main>
</template>
