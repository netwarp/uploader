<template>
    <ul class="list-group related">
        <li class="list-group-item related-item" v-for="video in videos">
            <div class="related-thumb">
                <a :href="'/watch/' + video.id + '/' + video.slug">
                    <img :src="'/api/thumbnail/' + video.id + '/' + video.public_id + '/2'" alt="test" class="related-img">

                    <span class="duration">{{ video.duration }}</span>
                </a>
            </div>
            <div class="related-infos">
                <a :href="'/watch/' + video.id + '/' + video.slug">
                    <h4 class="related-title">{{ video.title }}</h4>
                    <div class="related-username">
                        {{ video.username.name }}
                    </div>
                    <div class="related-view">
                        <small v-text="video.nb_views"></small>
                    </div>
                </a>
            </div>   
        </li>
    </ul>
</template>

<script>
	export default {
		mounted() {
			this.fetchRelated()
            console.log('ok');
		},
		data() {
			return {
                id: window.location.pathname.split('/')[2],
                videos: []
			}
		},

		methods: {
			fetchRelated() {
				this.$http.get('/api/related/' + this.id ).then((response) => {
				    console.log(response);
				    this.videos = response.data;
                })
			},
		}
	}
</script>

<style lang="sass" scoped>
    .list-group {

    }

    .related-item {
        display: flex;
    }

    .related-title {
        font-size: 13px;
        margin: 0;
    }

    .related-thumb {
        width: 168px;
        height: 94px;
        background: #eee;
        margin-right: 6px;
        position: relative;
    }

    .related-img {
        width: 168px;
        height: 94px;
    }

    .related-username {
        margin-top: 8px;
    }

    .duration {
        position: absolute;
        bottom: 0;
        right: 0;
        background: #000;
        color: #fff;
        padding: 2px 4px;
        font-size: 12px;
    }
</style>