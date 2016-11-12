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
        <div v-if="this.message">
            {{ message }}
        </div>
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
            this.getComments();
        },

        data() {
            return {
                id: window.location.pathname.split('/')[2],
                comments: [],
                user: {},
                content: '',
                status: '',
                message: false,
            }
        },

        methods: {
            getComments() {
                this.$http.get('/api/comments/' + this.id).then((response) => {
                    this.comments = response.data;
                })
            },

            postComment(event) {
                event.preventDefault();

                var data = {
                    content: this.content,
                };

                this.$http.post('/api/comments/' + this.id, data).then((response) => {
                    console.log(response.data);
                    this.message = response.data.message;
                    this.status = response.data.status;

                }, (response) => {
                    console.log(response)
                });

                this.comments.unshift({
                    user_name: 'You',
                    content: this.content,
                    created_at: 'now'
                });

                this.content = ''
            },
        },
    }
</script>
