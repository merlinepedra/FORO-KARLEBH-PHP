<template>
  <div class="py-3 md:grid grid-cols-2">

    <div>
      <div class="mt-6 w-11/12 mx-auto">
        <h1 class="text-sm md:text-lg lg:text-2xl font-base">Create Category</h1>
      </div>

      <div
      class="flex-1 flex items-center px-3 py-2 rounded-md relative"
      >
      <input
      autocomplete="off"
      type="text"
      v-model="name"
      placeholder="Name here..."
      class="pr-10 w-full rounded-md bg-gray-200 focus:ring-0 focus:border-blue-900 dark:bg-gray-400 dark:text-gray-800"
      />

      <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6 text-gray-800 absolute cursor-pointer"
      style="right: 1.2rem"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
      stroke-width="1.5"
      >
      <path
      stroke-linecap="round"
      stroke-linejoin="round"
      d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-8.172a2 2 0 00-1.414.586L3 12z"
      />
    </svg>

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
        name: '',
        errors: '',
        cats: this.categories,
      }
    },

    methods: {
      async create() {
        await axios
        .post(`/category`, {name: this.name.substr(0, 8)})
        .then(res => {
          this.cats = res.data
        })
        .catch(err => {
          this.errors = err.response.data.errors
        })
        this.name = null
      },
    },

  }
</script>