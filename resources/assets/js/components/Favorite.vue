<template>
	<div style="display: inline;">
		<p v-if="">
			{{ message }}
		</p>
		<button type="button" class="btn btn-primary btn-sm" @click="addFavorite">Favorite</button>
	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Favorite')
		}, 

		data() {
			return {
				id: window.location.pathname.split('/')[2],
				message: null
			}
		},

		methods: {
			addFavorite() {
				this.$http.post('/api/favorite/' + this.id, {}).then((response) => {
					console.log(response);
					this.message = response.data;
				}, (response) => {

				})
			}
		}
	}
</script>