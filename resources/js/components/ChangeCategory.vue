<template>
  <div>
   <select name="" id="" v-on:change="changeCategory($event)">
    <option 
    v-for="category in cats" 
    :key="category.id" 
    :value="category.id"
    :selected="cat_id == category.id"
    >{{ category.name }}</option>
  </select>
</div>
</template>

<script>
  export default {
    props: ['categories', 'category_id', 'post_slug'],

    data() {
      return {
        cats: this.categories,
        cat_id: this.category_id,
      }
    },

    methods: {
      async changeCategory(event) {
        await axios.patch(`/admin/change-category/${this.post_slug}`, {category_id: event.target.value})
      }
    }
    
  }
</script>