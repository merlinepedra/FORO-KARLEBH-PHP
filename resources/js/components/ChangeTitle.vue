<template>
  <div>
    <input type="text" v-model="title" :disabled="disabled" class="input" autofocus> 
    <div class="mt-3 text-lg">
      <button @click="isDisabled = !isDisabled" class="mr-2">edit</button> 
      <button @click="changeTitle" class="mr-2">save</button>
      <a :href="link" >Link to post</a>
    </div>
  </div>
</template>

<script>
  export default {
   props: ['post'],

   computed: {
    disabled() {
      return this.isDisabled
    },

    mounted() {
      document.getElementsByClassName('input').forEach(el => el.focus())
    },

    link() {
      return '/post/' + this.slug
    }
  },

  data() {
    return {
      data: this.post,
      isDisabled: true,
      errors: null,
      title: this.post.title,
      slug: this.post.slug,
    }
  },

  methods: {
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

  }

}
</script>