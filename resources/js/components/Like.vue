<template>
  <div v-cloak>
    <div class="inline-flex">
    <button class="text-gray-800 font-semibold text-lg md:text-2xl" v-if="!liked" @click.once="like()">Like</button>
    </div>
    <div class="inline-flex">
    <button class="text-gray-800 font-semibold text-lg md:text-2xl" v-if="liked" @click.once="unlike()">Unlike</button>
      
    </div>

    <span class="text-gray-800 font-semibold text-lg md:text-xl" v-if="count > 0">
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
          .then(res => {
            this.liked = true
            this.count = this.count + 1
          })
          .catch(err => window.location.href = '/login')

      },

      async unlike() {
        await axios
          .post(`/delete-like`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
          .then(res => {
            this.liked = false
            this.count--
          })
          .catch(err => window.location.href = '/login')
      },

      async likeData() {
        const { data } = await axios.post(`/likeData`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
        data[0] == 'liked' ? this.liked = true : this.liked = false
        this.count = data[1]
      }
    },
  }
</script>