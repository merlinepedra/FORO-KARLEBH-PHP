<template>
  <div>{{ counter }}</div>
</template>
<script>
  export default {
    props: ['count'],

    data() {
      return {
        counter: this.count
      }
    }
  }
</script>