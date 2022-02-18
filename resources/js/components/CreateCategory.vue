<template>
  <div class="py-3">

    <div>
      <div class="mt-10 w-9/12 mx-auto">
        <h1 class="text-2xl font-base">Create Category</h1>
      </div>

      <div class="mt-10 w-9/12 mx-auto">
        <input type="text" 
        v-model="name" placeholder="Name here..." class="w-full rounded-md focus:ring-0 focus:border-purple-500"> 
      </div>


      <div class="mt-8 w-9/12 mx-auto">
        <button @click.prevent="create" class="px-3 py-2 bg-gray-700 text-gray-100 rounded-md focus:ring-0 focus:border-purple-500 font-semibold">
          Create
        </button>
      </div>
    </div>

    <category-list :cats="cats"></category-list>

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