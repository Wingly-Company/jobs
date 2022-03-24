<script setup>
import { Inertia } from '@inertiajs/inertia'
import Layout from '@/Components/Layout'
import Filters from '@/Components/Filters'
import { ref, watch } from 'vue'
import throttle from 'lodash/throttle'
import pickBy from 'lodash/pickBy'
import mapValues from 'lodash/mapValues'

const props = defineProps({
  aircraft: Array,
  filters: Object,
})

const form = ref({
  search: props.filters.search,
})

const reset = () => {
  form.value = mapValues(form.value, () => null)
}

watch(
  () => form,
  throttle(() => {
    Inertia.get('/aircraft', pickBy(form.value), { preserveState: true })
  }, 150),
  { deep: true },
)
</script>

<template>
  <Layout title="Aircraft">
    <Filters v-model:search="form.search" @reset="reset" />

    <div class="bg-white rounded-md shadow overflow-x-auto mt-8">
      <table class="w-full whitespace-nowrap">
        <thead>
          <tr class="text-left font-bold">
            <th class="pb-4 pt-6 px-6">Name</th>
            <th class="pb-4 pt-6 px-6">Price</th>
            <th class="pb-4 pt-6 px-6">Max duration</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="a in aircraft" :key="a.id">
            <td class="border-t px-6 py-4">{{ a.name }}</td>
            <td class="border-t px-6 py-4">{{ a.price }}</td>
            <td class="border-t px-6 py-4">{{ a.max_duration }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </Layout>
</template>
