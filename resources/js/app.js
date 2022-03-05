require('./bootstrap');

import data from './data'
import methods from './methods'

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
Vue.component('UsersIcon', require('./components/UsersIcon.vue').default);
Vue.component('TitleEditButton', require('./components/TitleEditButton.vue').default);
Vue.component('ClipDesign', require('./components/ClipDesign.vue').default);
Vue.component('SearchDropDown', require('./components/SearchDropDown.vue').default);
Vue.component('CustomCheckbox', require('./components/CustomCheckbox.vue').default);
Vue.component('UsersChart', require('./components/UsersChart.vue').default);
Vue.component('CustomDropDown', require('./components/CustomDropDown.vue').default);
Vue.component('Doughnut', require('./components/Doughnut.vue').default);


const app = new Vue({
	el: '#main',

	data() {
		return data
  },

  methods: {
    ...methods,
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


