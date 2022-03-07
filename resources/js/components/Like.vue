<template>
  <div v-cloak class="flex items-center">
    <div class="inline-flex">
      <button class="text-gray-800 font-semibold mr-3" v-if="!liked" @click.once="like()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
        </svg>
      </button>
    </div>

    <div class="inline-flex">
      <button class="text-gray-800 font-semibold mr-3" v-if="liked" @click.once="unlike()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
        </svg>
      </button>
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
          user_id: this.user_id,
          url: window.location.href,
        })
        .then(res => {
          this.liked = true
          this.count = this.count + 1
        })
          // .catch(err => window.location.href = '/login')

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
          // .catch(err => window.location.href = '/login')
        },

        async likeData() {
          const { data } = await axios.post(`/like-data`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
          data[0] == 'liked' ? this.liked = true : this.liked = false
          this.count = data[1]
        }
      },
    }
  </script>