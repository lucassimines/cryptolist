<script lang="ts" setup>
defineProps({
  icon: {
    type: String,
    required: true
  },
  tag: {
    type: String,
    default: 'i'
  }
});
</script>

<template>
  <component :is="tag" class="icon" :class="`ri-${icon}-line`"></component>
</template>
