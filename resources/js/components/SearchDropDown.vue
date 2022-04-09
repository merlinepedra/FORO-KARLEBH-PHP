<template>
  <div class="relative">
    <div class="md:hidden relative">
      <form action="flex">
        <div class="flex-1 flex items-center px-3 py-2 rounded-md">
          <input type="text" 
          v-model="item" @input="searcher" placeholder="Search for topics" class="w-full rounded-md bg-gray-200 focus:ring-0 focus:border-blue-900">
          <button v-if="item.length > 0" @click.prevent="clearInput">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="none">
              <path fill-rule="evenodd" d="M6.707 4.879A3 3 0 018.828 4H15a3 3 0 013 3v6a3 3 0 01-3 3H8.828a3 3 0 01-2.12-.879l-4.415-4.414a1 1 0 010-1.414l4.414-4.414zm4 2.414a1 1 0 00-1.414 1.414L10.586 10l-1.293 1.293a1 1 0 101.414 1.414L12 11.414l1.293 1.293a1 1 0 001.414-1.414L13.414 10l1.293-1.293a1 1 0 00-1.414-1.414L12 8.586l-1.293-1.293z" clip-rule="evenodd" />
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
        results: []
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