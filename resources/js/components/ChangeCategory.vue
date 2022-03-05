<template>
  <div>
    <custom-drop-down :slug="post_slug" :categories="cats" :cat_id="cat_id" :cat="curr_category"></custom-drop-down>
  </div>
</template>

<script>

  export default {
    props: ['categories', 'category_id', 'post_slug', 'current_category'],

    data() {
      return {
        cats: this.categories,
        cat_id: this.category_id,
        curr_category: this.current_category
      }
    },

  }
</script>