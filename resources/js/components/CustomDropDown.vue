<template>
  <div class="w-40 relative">
    <button @click="openOptions = !openOptions" class="px-3 py-1 bg-blue-900 block rounded-md text-gray-100">
      <div class="flex items-center justify-between">
        <span class="mr-20">
          {{ buttonValue }}
        </span>

        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path v-if="!openOptions" fill-rule="evenodd" d="M15.707 4.293a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 011.414-1.414L10 8.586l4.293-4.293a1 1 0 011.414 0zm0 6a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-5-5a1 1 0 111.414-1.414L10 14.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
          <path v-if="openOptions" fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414 0zm0-6a1 1 0 010-1.414l5-5a1 1 0 011.414 0l5 5a1 1 0 01-1.414 1.414L10 5.414 5.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </div>
    </button>

    <transition name="fade">
      <div v-if="openOptions" id="" class="options absolute z-10 w-full flex flex-col rounded-md text-gray-100 overflow-auto mt-3" style="max-height: 120px;">

       <div v-for="cat in cats" :key="cat.id" class="cursor-pointer flex-1">
        <label class="option px-2 py-2 bg-blue-900 block border-b border-dashed border-white">
          <input @click="changeCategory(cat.id, $event)" type="radio" :value="cat.name" v-model="category" class="hidden">
          {{ cat.name }}
        </label>
      </div>
    </div>
  </transition>

</div>
</template>

<style scoped>
  .options::-webkit-scrollbar {
    width: 15px;
    background: lightblue;
  }

  .options::-webkit-scrollbar-thumb {
    border-radius: 8px;
    background: whitesmoke;
  }
</style>

<script>
  export default {
    props: ['categories', 'cat_id', 'cat', 'slug'],

    data() {
      return {
        category: '',
        openOptions: false,
        buttonValue: this.cat.name,
        cats: this.categories,
        category_id: this.cat_id,
        // current_category: this.cat
      }
    },

    methods: {
      async changeCategory(category, event) {
        await axios.patch(`/admin/change-category/${this.slug}`, {category_id: category})
        this.buttonValue =  event.target.value
        setTimeout(() => {this.openOptions = false}, 100)
      }

    }
  }
</script>