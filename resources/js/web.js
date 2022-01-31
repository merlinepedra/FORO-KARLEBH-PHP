require('./bootstrap');

import  Vue from  'vue'    
Vue.config.productionTip = false


Vue.component('Hello', require('./components/Hello.vue').default);
Vue.component('chart', require('./components/Chart.vue').default);
Vue.component('svg-links', require('./components/SVGLinks.vue').default);

const app = new Vue({
	el: '#main',
	mounted() {
		let prevScrollpos = window.pageYOffset;
		window.onscroll = function() {
			let currentScrollPos = window.pageYOffset;
			if (prevScrollpos > currentScrollPos) {
				document.getElementById("navBar").style.top = "0";
			} else  {
				document.getElementById("navBar").style.top = "-50px";
			}
			prevScrollpos = currentScrollPos;
			
			if (window.pageYOffset >= 100) {
				document.getElementById('navBar').classList.add('bg-gray-600', 'shadow-md')
			} else {
				document.getElementById('navBar').classList.remove('bg-gray-600', 'shadow-md')
			}
		}
	},
	data() {
		return {
			one: "from Vue",
			open: false,
			navOpen: false,
		}
	}
});
