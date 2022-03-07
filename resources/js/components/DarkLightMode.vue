<template>
  <div>
    <button v-if="mode == 'dark'" @click="toggle" class="text-red-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
      </svg>
    </button>

    <button v-if="mode == 'light'" @click="toggle" class="text-blue-400">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
      </svg>
    </button>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        mode: localStorage.theme
      }
    },

    methods: {
      toggle() {
        let theme = localStorage.getItem('theme')
        let htmlClasses = document.querySelector('html').classList

        if (theme == 'dark') {
          htmlClasses.remove('dark')
          localStorage.removeItem('theme')
          this.mode = 'light'
        } else {
          htmlClasses.add('dark')
          localStorage.theme = 'dark'
          this.mode = 'dark'
        }
      }
    }
  }
</script>