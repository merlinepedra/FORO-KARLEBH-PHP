<template>
  <div class="mx-auto">
    <div class="flex flex-col items-center justify-center">

      <button @click.once="like()">
        <svg :class="{'text-blue-900': liked}" class="fill-current text-gray-400" width="100px" height="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 330 330"  xml:space="preserve">
        <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
        C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
        c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z"/>
      </svg>
    </button>

    <div :class="{'text-blue-900': liked}" class="text-gray-800 font-semibold text-lg">
      {{ counter }}
    </div>


    <button style="transform: rotate(180deg);" @click.once="unlike()">
      <svg  class="fill-current text-gray-400" width="100px" height="20px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      viewBox="0 0 330 330"  xml:space="preserve">
      <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
      C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
      c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z"/>
    </svg>
  </button>

</div>
</div>
</template>

<script>
  export default {
    props: ['likeable_id', 'likeable_type', 'user_id'],

    data() {
      return {
        liked: '',
        count: '',
      }
    },

    computed: {
      counter() {
        return this.count > 0 ? this.count : 0
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
        .post(`/unlike`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
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