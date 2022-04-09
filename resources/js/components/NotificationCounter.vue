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
    },

      mounted() {
        Echo.channel('like')
        .listen('NotifiableEvent', notification => {
          console.log('Realtime baby!!')
          // this.counter++
        })
      }
  }
</script>