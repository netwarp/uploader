
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */


Vue.component('example', require('./components/Example.vue'));
Vue.component('comments', require('./components/Comments.vue'));
Vue.component('favorite', require('./components/Favorite.vue'));
Vue.component('rate', require('./components/Rate.vue'));

const app = new Vue({
    el: '#app'
});


var plyr = require('plyr');
plyr.setup(document.querySelector('video', {
    controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'fullscreen']
}));

(function hoverImg() {
	var thumbs = document.querySelectorAll('.thumb')

	for (var i = 0; i < thumbs.length; i++) {
		var thumb = thumbs[i]
		var slider
		var index = 0

		thumb.addEventListener('mouseover', function(i) {
			var img_src = i.target.src // http://domain.com/api/{id}/{publi_id}/{index}
			var last_slash = img_src.lastIndexOf('/') // 48
			var start_src = img_src.slice(0, img_src.lastIndexOf('/')) + '/' // http://domaine.com/api/thumbnail/{id}/{publi_id}/
			
			slider = setInterval(function() {
				index++
				i.target.src = start_src + index
				if (index > 11) {
					index = 0
				}
			}, 1000)
			
		})

		thumb.addEventListener('mouseleave', function(i) {
			clearInterval(slider)
			slider = null
			index = 0
		})
	}
})()

  