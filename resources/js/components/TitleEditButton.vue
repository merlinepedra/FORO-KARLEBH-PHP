<template>
  <div>
    <button class="mt-3" v-on:click="editAction">Edit</button>
  </div>
</template>

<script>
  export default {
    methods: {
      editAction(event) {
        LocalStorage.setItem('post', event.target.data-id)
        this.$emit('changeTitle')
      }
    }
  }
</script>