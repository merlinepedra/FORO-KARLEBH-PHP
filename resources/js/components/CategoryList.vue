<template>
  <div>
    <div v-for="category in data" :key="category.id">
      <a :href="link(category.name)"> {{ category.name }} </a>

      <!-- <button v-if="category.posts_count < 1" class="text-lg uppercase" 
      @click="delete(category.id)"
      >x</button> -->
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
    async delete(category) {
      await axios.delete(`/category/${category}`)

    }

  }
}
</script>