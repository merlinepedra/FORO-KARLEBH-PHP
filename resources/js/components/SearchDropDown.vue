<template>
  <div class="relative">
    <div class="md:hidden relative">
      <form action="flex">
        <div class="flex-1 flex items-center px-3 py-2 rounded-md">
          <input type="text" v-model="item" @input="searcher" placeholder="Search for topics" class="w-full rounded-md bg-gray-200 focus:ring-0 focus:border-blue-900">
          <button v-if="item.length > 0" @click.prevent="clearInput">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
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
    <div class="hidden md:block relative bg-gray-200">
      <form action="flex">
        <div class="flex-1 flex px-3 py-2">
          <svg viewBox="0 0 24 24" aria-hidden="true" class="h-6 w-6 fill-current mr-3"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
          <input placeholder="Search for topics" v-model="item" @input="searcher" class="flex-1 bg-gray-200 rounded-r-sm focus:outline-none">
          <button v-if="item.length > 0" @click.prevent="clearInput">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
              <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
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


  </div>
</template>

<script>
  import { debounce } from 'lodash-es'

  export default {
    data() {
      return {
        item: '',
        results: ''
      }
    },

    methods: {
      searcher: debounce(function (event) {
        this.search()
      }, 500),

      async search() {
        await axios.get(`/search`, {item: this.item})
        .then(res => {
          // console.log(res.data)
          this.results = res.data.splice(-10)
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