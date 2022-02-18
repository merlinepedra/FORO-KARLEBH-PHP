<template>
  <div>
     <button @click="makeLatest" class="px-4 py-2 bg-green-600 font-semibold text-gray-100 rounded-md">Make Latest</button>
  </div>
</template>

<script>
  export default {
    props: ['post_slug'],

    methods: {
      makeLatest() {
        axios.patch(`/admin/make-latest/${this.post_slug}`)
      }
    }
  }
</script>