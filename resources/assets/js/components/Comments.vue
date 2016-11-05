<template>
    <div class="well">
        <h3 class="h5">Comments</h3>
        <form @submit="postComment">
            <div class="form-group">
                <textarea rows="4" class="form-control" v-model="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Send</button>
            </div>
        </form>
        <hr>
        <ul class="list-group">
            <li class="list-group-item" v-for="comment in comments">
                <div>
                    {{ comment.user_name}} <span class="small">{{ comment.created_at }}</span>
                </div>
                <div>
                    {{ comment.content }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
        //    Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('_token').getAttribute('content')
            this.getComments()
        },

        data() {
            return {
                id: window.location.pathname.split('/')[2],
                comments: [],
                content: ''
            }
        },

        methods: {
            getComments() {
                this.$http.get('/api/comments/' + this.id).then((response) => {
                    console.log(response)
                    this.comments = response.data;
                })
            },

            postComment(event) {
                event.preventDefault();

                this.$http.post('/api/comments/' + this.id, { content: this.content }).then((response) => {
                    console.log(response)
                }, (response) => {
                    console.log(response)
                });

                this.content = ''
            },
        }
    }
</script>
