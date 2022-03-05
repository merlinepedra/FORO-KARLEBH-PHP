<template>
  <div class="py-3 md:grid grid-cols-2">

    <div>
      <div class="mt-6 w-11/12 mx-auto">
        <h1 class="text-sm md:text-lg lg:text-2xl font-base">Create Category</h1>
      </div>

      <div class="mt-4 w-11/12 mx-auto">
        <input type="text" 
        v-model="name" placeholder="Name here..." class="w-full rounded-md focus:ring-0 focus:border-purple-500"> 
      </div>


      <div class="mt-2 w-11/12 mx-auto">
        <button @click.prevent="create" class="px-3 py-1 bg-green-700 text-gray-200 text-md rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
          Create
        </button>
      </div>
    </div>

    <category-list :cats="cats" class="mx-auto mt-7"></category-list>

  </div>
</template>

<script>
  import CategoryList from './CategoryList'

  export default {
    props: ['categories'],

    data() {
      return {
        name: null,
        errors: null,
        cats: this.categories,
      }
    },

    methods: {
      async create() {
        await axios
        .post(`/category`, {name: this.name})
        .then(res => {
          this.cats = res.data
        })
        .catch(err => {
          this.errors = err.response.data.errors
        })
        this.name = null
      }
    }

  }
</script>