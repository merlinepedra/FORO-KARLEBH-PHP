require('./bootstrap');

import  Vue from  'vue'
import * as FilePond from 'filepond'
import Dropzone from "dropzone"
import "dropzone/dist/dropzone.css"

import "Filepond/dist/filepond.css"
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageExifOrientation from 'filepond-plugin-image-exif-orientation';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImageEdit from 'filepond-plugin-image-edit';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import 'filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css';
FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginImageExifOrientation,
  FilePondPluginFileValidateSize,
  FilePondPluginImageEdit
  );

Vue.config.productionTip = false


Vue.component('Hello', require('./components/Hello.vue').default);
Vue.component('chart', require('./components/Chart.vue').default);
Vue.component('svg-links', require('./components/SVGLinks.vue').default);
Vue.component('Like', require('./components/Like.vue').default);
Vue.component('Images', require('./components/Images.vue').default);
Vue.component('Follow', require('./components/Follow.vue').default);
Vue.component('NotificationCounter', require('./components/NotificationCounter.vue').default);
Vue.component('ToggleAdmin', require('./components/ToggleAdmin.vue').default);
Vue.component('MakeLatest', require('./components/MakeLatest.vue').default);
Vue.component('ChangeCategory', require('./components/ChangeCategory.vue').default);
Vue.component('ChangeTitle', require('./components/ChangeTitle.vue').default);
Vue.component('CreateCategory', require('./components/CreateCategory.vue').default);
Vue.component('CategoryList', require('./components/CategoryList.vue').default);
Vue.component('Vote', require('./components/Vote.vue').default);
Vue.component('Explore', require('./components/Explore.vue').default);

const app = new Vue({
	el: '#main',

	data() {
		return {
			one: "from Vue",
			open: false,
			navOpen: false,
      megaMenu: false,
      profileMenu: false,
      mobileNav: true,
      searchBoxOpen: false,
    }
  },

  methods: {
    openReplyBox($event){
      $event.target.parentNode.nextElementSibling.classList.contains('hidden') 
      ? $event.target.parentNode.nextElementSibling.classList.replace('hidden', 'block')
      : $event.target.parentNode.nextElementSibling.classList.replace('block', 'hidden')
    },


    reply($event) {

      const parentId = $event.target.getAttribute('data-parent-id')
      const sendBtn = document.getElementById('sendBtn')
      const textarea = document.getElementById('textarea')

      const parentIdTag = document.createElement('input')
      parentIdTag.type = 'hidden'
      parentIdTag.name = 'parent_id'
      parentIdTag.id = 'parent_id'
      parentIdTag.value = parentId

      document.getElementById('commentBox').append(parentIdTag)
      
      sendBtn.value = "Send Reply"
      sendBtn.classList.replace('bg-blue-900', 'bg-green-600')

      textarea.placeholder = "Replies here..."

      console.log(document.getElementById('commentBox'))


    }
  }
})


const photo = document.getElementById('photo')
FilePond.create(photo)
FilePond.setOptions({
  server: {
    url: '/filepondUpload',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    }
  }
})

const photos = document.querySelectorAll('.photo')
FilePond.create(photos)
FilePond.setOptions({
  server: {
    url: '/filepondUpload',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
    }
  }
})

// new Dropzone('#my_dropzone', {
//   url: '/dropzone',
//   headers: {
//     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
//   },
//   paramName: 'dropzone',
// })


