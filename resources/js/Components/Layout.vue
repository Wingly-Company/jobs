<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'
import Logo from '@/Components/Logo'

defineProps({ title: String })

const navigation = ref([
  { label: 'Home', href: '/' },
  { label: 'Aircraft', href: '/aircraft' },
])
</script>

<template>
  <Head :title="title" />
  <header>
    <nav class="bg-white shadow border-b border-transparent">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 relative">
          <div class="flex items-center flex-shrink-0">
            <Link href="/"><Logo /></Link>
          </div>
          <div class="items-center flex">
            <Link v-for="(link, linkIdx) in navigation" :key="linkIdx" :href="link.href" class="text-gray-500 hover:text-gray-700 inline-flex items-center px-3 text-sm font-medium">
              {{ link.label }}
            </Link>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="max-w-7xl mx-auto w-full mt-8 mb-8 relative px-4 sm:px-6 lg:px-8 ">
    <slot />
  </main>
</template>
