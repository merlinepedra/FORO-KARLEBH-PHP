<template>
  <div class="relative">
    <div class="md:hidden relative">
      <form :action="url" method="get">
        <!-- <input type="hidden" name="_token" :value="csrf"> -->
        <div class="flex-1 flex items-center px-3 py-2 rounded-md">
          <input autocomplete="off" type="text" name="search" placeholder="Search for topics" 
          class="w-full rounded-md bg-gray-200 focus:ring-0 focus:border-blue-900 dark:bg-gray-400 dark:text-gray-800">
        </div>
      </form>

      <div class="absolute z-10 rounded-md shadow-md mt-3 w-full bg-gray-200" v-if="results.length > 0">
        <div v-for="result in results" :key="result.id" class="px-3 py-2 hover:bg-blue-100">
          <a :href="getUrl(result.slug)">{{ result.title }}   </a>
        </div>  
      </div>
    </div>

    <!-- desktop -->
    <div class="hidden md:block relative bg-gray-200 dark:bg-gray-400">
      <form action="flex rounded-lg overflow-hidden">
        <div class="flex-1 flex px-3 py-2 rounded-lg overflow-hidden">
          <button>
            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6  mr-3"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
          </button>
          <input placeholder="Search for topics" 
          v-model="item" @input="searcher" 
          class="flex-1 bg-gray-200 dark:bg-gray-400 dark:text-gray-800 rounded-r-md focus:outline-none">
          <button v-if="item.length > 0" @click.prevent="clearInput" >
            <svg class="h-6 w-6" stroke="none" fill="none" viewBox="0 0 24 24">
              <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
          </button>
        </div>
      </form>

      <div class="absolute z-10 rounded-md overflow-hidden shadow-md mt-3 w-full bg-gray-200 dark:bg-gray-400 dark:text-gray-800" v-if="results.length > 0">
        <a v-for="result in results" :key="result.id" :href="getUrl(result.slug)">
          <div class="px-3 py-2 hover:bg-blue-100">
            {{ result.title }}  
          </div>  
        </a>
      </div>

      <div class="absolute z-10 rounded-md overflow-hidden shadow-md mt-3 w-full bg-gray-200 dark:bg-gray-400 dark:text-gray-800" 
      v-if="Array.isArray(results) && results.length == 0">
      <div class="px-3 py-2 hover:bg-blue-100">
       no result for {{ item }}  
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
        url: window.location.origin + '/mobile-search'
      }
    },

    methods: {
      searcher: debounce(function (event) {
        this.search()
      }, 500),

      async search() {
        this.item.length > 0 && await axios.post(`/search`, {item: this.item})
        .then(res => {
          console.log(res.data)
          console.log(res.data[1])
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