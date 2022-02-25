<template>
  <div>
    <button style="background: red;" class="py-1 px-2 text-gray-100 rounded-md">Block User</button>
  </div>
</template>

<script>
  export default {
    props: ['user_id'],
    methods: {
      async blockUser() {
        await axios.patch(`/admin/block/${this.user_id}`)
      },

      async unblockUser() {
        await axios.patch(`/admin/unblock/${this.user_id}`)
      },

    }
  }
</script>