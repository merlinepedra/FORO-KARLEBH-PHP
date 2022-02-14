<template>
  <div v-cloak>
    <div class="inline-flex">
    <button class="text-gray-800 font-semibold text-2xl" v-if="!liked" @click.once="like()">Like</button>
    </div>
    <div class="inline-flex">
    <button class="text-gray-800 font-semibold text-2xl" v-if="liked" @click.once="unlike()">Unlike</button>
      
    </div>

    <span class="text-gray-800 font-semibold text-xl" v-if="count > 0">
      {{ count }}
    </span>
  </div>
</template>

<style>
  [v-cloak] {
    display: none;
  }
</style>

<script>
  export default {
    props: ['likeable_id', 'likeable_type', 'user_id'],

    data() {
      return {
        liked: '',
        count: Number,
      }
    },

    created() {
      this.likeData()
    },


    methods: {
      async like() {
        await axios
          .post(`/like`, {
            likeable_id: this.likeable_id, 
            likeable_type: this.likeable_type,
            user_id: this.user_id
          })
          .then(response => console.log(response.data))
          .catch(err => window.location.href = '/login')
          this.liked = true
          this.count = this.count + 1

      },

      async unlike() {
        await axios
          .post(`/unlike`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
          .catch(err => window.location.href = '/login')
          this.liked = false
          this.count--
      },

      async likeData() {
        const { data } = await axios.post(`/likeData`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
        data[0] == 'liked' ? this.liked = true : this.liked = false
        this.count = data[1]
      }
    },
  }
</script>