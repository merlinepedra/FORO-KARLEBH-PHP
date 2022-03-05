<template>
  <div>
    <button v-if="!isAdmin" @click="makeAdmin" class="px-4 py-2 bg-green-600 font-semibold text-gray-100 rounded-md">Make Admin</button>
    <button v-if="isAdmin" @click="makeUser" class="px-4 py-2 bg-gray-800 text-gray-100 font-semibold rounded-md">Make User</button>
  </div>
</template>

<script>
  export default {
    props: ['is_admin', 'user_id'],

    data() {
      return {
        isAdmin: this.is_admin,
      }
    },

    methods: {
      async makeAdmin() {
        await axios.patch(`/admin/make-admin/${this.user_id}`)
        this.isAdmin = true
      },

      async makeUser() {
        await axios.patch(`/admin/make-user/${this.user_id}`)
        this.isAdmin = false

      }
    }
  }
</script>