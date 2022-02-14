<template>
  <div class="grid grid-cols-2 gap-5 mt-10">
    <div v-for="picture in pictures" :key="picture.id">
      <div class="relative">
        <img 
        class="h-72 w-96" :src="getUrl(picture.file)" alt=""
        >
        <button @click="deleteImage(picture)" class="absolute text-5xl text-red-300 top-0 right-0 hover:scale-50">X</button>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['images'],
    data() {
      return {
        pictures: this.images
      }
    },
    methods: {
      getUrl(path) {
        return "/storage/uploads/" + path
      },
      async deleteImage(picture) {
        await axios.post(`/file/${picture.id}`)
        this.pictures.splice(this.pictures.indexOf(picture), 1)
      }
    }

  }
</script>