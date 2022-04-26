<template>
  <div class="relative">
    <div class="md:hidden relative">
      <form :action="url" method="get">
        <div class="flex-1 flex items-center px-3 py-2 rounded-md relative">
          <input autocomplete="off" type="text" name="search" id="mobileSearch" placeholder="Search for topics" 
          class="pr-10 w-full rounded-md bg-gray-200 focus:ring-0 focus:border-blue-900 dark:bg-gray-400 dark:text-gray-800">
          <button class="text-gray-800 absolute" 
          style="right: 1.2rem;" @click.prevent="clear">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
          </button>
        </div>
      </form>

      <div class="absolute z-10 rounded-md shadow-md mt-3 w-full bg-gray-200" v-if="results.length > 0">
        <div v-for="result in results" :key="result.id" class="px-3 py-2 hover:bg-blue-100">
          <a :href="getUrl(result.slug)">{{ result.title }}   </a>
        </div>  
      </div>
    </div>

    <!-- desktop -->
    <div class="hidden md:block relative z-30">
      <form :action="url" method="get">
        <div style="perspective: 1px;" class="flex-1 flex px-3 py-2 rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-400">
          <button>
            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 mr-3"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
          </button>
          <input placeholder="Search for topics" 
          v-model="item" @input="searcher" name="search" autocomplete="off"
          class="bg-gray-200 dark:bg-gray-400 dark:text-gray-800 focus:outline-none flex-1">
          <button class="text-gray-800" @click="closeOverlay" v-if="item.length > 1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z" />
            </svg>
          </button>
        </div>
      </form>

      <button v-if="results.length > 0 || (Array.isArray(results) && results.length == 0)" @click="closeOverlay" 
        class="bg-transparent inset-0 w-full h-full fixed" style="z-index: 30;"></button>

        <div class="absolute z-30 rounded-md overflow-hidden shadow-md mt-3 w-full bg-gray-200 dark:bg-gray-400 dark:text-gray-800" 
        v-if="results.length > 0">
        <a v-for="result in results" :key="result.id" :href="getUrl(result.slug)">
          <div class="px-3 py-2 hover:bg-blue-100">
            {{ result.title }}  
          </div>  
        </a>
      </div>

      <div class="absolute z-10 rounded-md overflow-hidden shadow-md mt-3 w-full bg-gray-200 dark:bg-gray-400 dark:text-gray-800" 
      v-if="Array.isArray(results) && results.length == 0">
      <div class="px-3 py-2 hover:bg-blue-100">
        no result for "{{ item }}" 
      </div>  
    </div>


  </div>
</div>
</template>

<script>
  import { debounce } from 'lodash-es'

  export default {
    data() {
      return {
        item: '',
        results: [],
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        url: window.location.origin + '/search-view',
      }
    },

    methods: {
      closeOverlay() {
        this.results = ''
        this.item = ''
      },

      clear() {
        document.getElementById('mobileSearch').value = ''
      },

      searcher: debounce(function (event) {
        this.search()
      }, 250),

      async search() {
        this.item.length > 0 && await axios.post(`/search`, {item: this.item})
        .then(res => {
          this.results = res.data[1]
        })
      },

      getUrl(slug) {
        return `/post/${slug}`
      },

      clearInput() {
        this.item = ''
        this.results = ''
      }
    },

    watch: {
      results: {
        immediate: true,
        handler(newVal, oldVal) {
          if (this.item.length < 2) this.results = ''
        }
    }
  }
}
</script>