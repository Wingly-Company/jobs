<script setup>
defineProps({
  search: String,
})

defineEmits(['update:search', 'reset'])
</script>

<template>
  <div class="flex items-center justify-between">
    <div class="flex w-full bg-white rounded shadow">
      <input class="relative px-6 py-3 w-full rounded-r focus:shadow-outline" autocomplete="off" type="text" name="search" placeholder="Search…" :value="search" @input="$emit('update:search', $event.target.value)" />
    </div>
    <button class="ml-3 text-gray-500 hover:text-gray-700 focus:text-blue-800 text-sm" type="button" @click="$emit('reset')">Reset</button>
  </div>
</template>
