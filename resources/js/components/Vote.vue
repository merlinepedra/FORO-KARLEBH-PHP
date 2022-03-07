<template>
  <div>
    <div class="flex flex-col items-center justify-center">

      <button @click.once="like()">
        <svg :class="{'text-blue-700': liked}" class="text-gray-500 fill-current h-6 w-6"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 330 330"  xml:space="preserve">
        <path id="XMLID_29_" d="M100.606,100.606L150,51.212V315c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15V51.212l49.394,49.394
        C232.322,103.535,236.161,105,240,105c3.839,0,7.678-1.465,10.606-4.394c5.858-5.857,5.858-15.355,0-21.213l-75-75
        c-5.857-5.858-15.355-5.858-21.213,0l-75,75c-5.858,5.857-5.858,15.355,0,21.213C85.251,106.463,94.749,106.463,100.606,100.606z"/>
      </svg>
    </button>

    <div :class="{'text-blue-700': liked}" class="text-gray-500 sfont-semibold text-lg">
      {{ counter }}
    </div>


    <button style="transform: rotate(180deg);" @click.once="unlike()">
      <svg :class="{'text-grenn-700': !liked}"  class="text-gray-500 fill-current h-6 w-6"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
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
        upVote: '',
        downVote: '',
        likeCount: '',
        unlikeCount: '',
        count: '',
      }
    },

    computed: {
      counter() {
        return this.count > 0 ? this.count : 0
      }
    },

    created() {
      this.voteData()
    },


    methods: {
      async like() {
        await axios
        .post(`/up-vote`, {
          likeable_id: this.likeable_id, 
          likeable_type: this.likeable_type,
          user_id: this.user_id
        })
        .then(res => {
          this.liked = true
          this.count++
        })
        .catch(err => console.log(err))
        // .catch(err => window.location.href = '/login')

      },

      async unlike() {
        await axios
        .post(`/down-vote`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})
        .then(res => {
          this.liked = false
          this.count--
        })
        // .catch(err => window.location.href = '/login')
        // .catch(err => console.log(err))
      },

      async voteData() {
        const { data } = await axios.post(`/vote-data`, {likeable_id: this.likeable_id, likeable_type: this.likeable_type})

        if (data['data'] == 'like') {
          this.liked = true
        } else if (data['data'] == 'unlike') {
          this.liked = false
        } else {
          this.liked = ''
        }

        this.likeCount = data['likeCount']
        this.unlikeCount = data['unlikeCount']
        this.count = data['likeCount'] - data['unlikeCount']
      }
    },
  }
</script>