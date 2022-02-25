<template>
  <div>
    <div style="background: linear-gradient(rgba(0,0,0,.1), rgba(0,0,0,.1));" 
    class="fixed w-full h-full inset-0 right-0 z-20 mx-auto">
    <br><br><br><br><br><br>
    <div class="flex flex-col gap-y-5 ">
      <textarea class="input flex-shrink-0 rounded-md focus:outline-none h-32">
        {{ data }}
      </textarea>
      <div>
        <button @click="changeTitle" class="bg-blue-900 text-gray-100 rounded-md px-5 py-2 mr-8">Save</button>
        <button class="bg-gray-900 text-gray-100 rounded-md px-5 py-2" @click="$emit('close')">Close</button>
      </div>
    </div>

  </div>

<!--     <input type="text" v-model="title" :disabled="disabled" class="input" autofocus> 
    <div class="mt-3 text-lg">
      <button @click="isDisabled = !isDisabled" class="mr-2">edit</button> 
      <button @click="changeTitle" class="mr-2">save</button>
      <a :href="link" >Link to post</a>
    </div> -->
  </div>
</template>

<script>
  export default {
   props: ['post'],

    mounted() {
      this.loadData()
    },

   computed: {
    disabled() {
      return this.isDisabled
    },

    link() {
      return '/post/' + this.slug
    }
  },

  data() {
    return {
      data: '',
      isDisabled: true,
      errors: null,
      title: '',
      slug: '',
    }
  },

  methods: {
    loadData() {
      let data = JSON.parse(localStorage.getItem('post'))
      [this.data, this.title, this.slug] = [data, data.title, data.slug]
      // this.data = data
      // this.title = data.title
      // this.slug = data.slug
    },

    async changeTitle() {
      await axios
      .patch(`/admin/change-title/${this.slug}`, {
        title: this.title,
      })
      .then(res => {
        this.slug = res.data.slug
      })
      .catch(err => {
        this.errors = err.response.data.errors
        console.log(err.response.data.errors)
      })
      this.isDisabled = true
    },

  },

  watch: {
    data: {
      immediate: true,
      handler(newVal, oldVal) {
        this.data = newVal
      }
    }
  }

}
</script>