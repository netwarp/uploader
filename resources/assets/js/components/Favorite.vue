<template>
	<button type="button" class="btn btn-primary btn-sm" @click="addFavorite">Favorite</button>
</template>

<script>
	export default {
		mounted() {
		//	console.log('Favorite')
		}, 

		data() {
			return {
				favorite: false
			}
		},

		methods: {
			addFavorite() {
				this.$http.get('api/favorite/video_id/user_id').then((response) => {
					console.log()
				})
			}
		}
	}
</script>