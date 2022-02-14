<template>
  <div>
    <button v-text="buttonText" @click="follow" 
    :class="{'bg-green-500' : status, 'bg-blue-500' : !status}"
    class="px-4 py-1 font-md text-gray-100 rounded-md"></button>
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
      buttonText() {
        return this.status ? 'Unfollow' : 'Follow'
      }
    },

    methods: {
      follow() {
        axios.post(`follow/${this.user_id}`)
        .then(response => this.status = !this.status)
        .catch(error => error.response.status = 401 ? window.location = '/login' : '')
      }
    }
  }
</script>