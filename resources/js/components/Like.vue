<template>
  <div class="inline-flex items-center">
    <div class="inline-flex">
      <button v-if="!liked" class="text-gray-800 font-semibold mr-3" @click.once="like()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
      </button>
    </div>

    <div class="inline-flex">  
      <button v-if="liked" class="text-blue-800 font-semibold mr-3" @click.once="unlike()">
       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>

  <div class="text-blue-900 dark:text-gray-400 font-bold inline-flex" v-if="count > 0">
    {{ count }}
  </div>

</div>
</template>

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
          user_id: this.user_id,
          url: window.location.href,
        })
        .then(res => {
          this.liked = true
          this.count = this.count + 1
        })
        .catch(err =>  err.response.status === 401 ? window.location.href = '/login' : '')

      },

      async unlike() {
        await axios
        .post(`/delete-like`, {
          likeable_id: this.likeable_id, 
          likeable_type: this.likeable_type,
          url: window.location.href,
        })
        .then(res => {
          this.liked = false
          this.count--
        })
        .catch(err =>  err.response.status === 401 ? window.location.href = '/login' : '')
      },

      async likeData() {
        const { data } = await axios.post(`/like-data`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
        data[0] == 'liked' ? this.liked = true : this.liked = false
        this.count = data[1]
      }
    },
  }
</script>