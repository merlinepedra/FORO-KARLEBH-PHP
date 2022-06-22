<template>
  <div>
    <button v-text="buttonText" @click="follow" 
    :class="classObject"
    class="px-6 py-2 font-md text-gray-200 rounded-md"></button>
  </div>
</template>

<script>
  export default {
    props: ['user_id', 'follows'],

    data() {
      return {
        status : this.follows
      }
    },

    computed: {
      classObject() {
        return {
          'bg-red-500': this.status,
          'bg-blue-500 dark:bg-blue-500': !this.status
        }
      },

        buttonText() {
        return this.status ? 'Unfollow' : 'Follow'
      }
    },

    methods: {
      async follow() {
        await axios.post(`/follow/${this.user_id}`)
        .then(response => this.status = !this.status)
        .catch(error => error.response.status = 401 ? window.location = '/login' : '')
      }
    }
  }
</script>