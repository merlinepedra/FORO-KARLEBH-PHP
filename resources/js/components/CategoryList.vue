<template>
  <div class="flex flex-col items-center justify-center md:block">
    <div v-for="category in data" :key="category.id">
      <a class="mr-3 text-gray-800 dark:text-gray-300" :href="link(category.name)"> {{ category.name }} </a>

      <button v-if="category.posts_count < 1" class="text-lg uppercase" v-on:click="deleteCategory(category.id, $event)">
        <svg style="color: mediumvioletred;" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="current" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

    </div>
  </div>
</template>

<script>
  export default {
    props: ['cats'],
    data() {
      return {
        data: this.cats
      }
    },
    watch: {
      cats: {
        immediate: true,
        handler(newVal, oldVal) {
          this.data = newVal
        }
      }
    },
    methods: {
      link(link) {
        return '/category/' + link
      },
      async deleteCategory(category, event) {
        if (confirm('Are you sure you want to delete this catgeory?')) {
          await axios.delete(`/category/${category}`)
          .then(
            res => res.status = 200 
            ? event.target.parentElement.parentElement.style.display = 'none' 
            : ''
            )
        }

      }

    }
  }
</script>