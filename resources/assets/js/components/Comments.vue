<template>
    <div class="well">
        <h3 class="h5">Comments</h3>
        <form @submit="postComment" method="POST">
            <div class="form-group">
                <textarea rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Send</button>
            </div>
        </form>
        <hr>
        <ul class="list-group">
            <li class="list-group-item" v-for="comment in comments">
                <div>
                    {{ comment.user}} <span class="small">{{ comment.date }}</span>
                </div>
                <div>
                    {{ comment.message }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('comments ready to be loadedzz')
            this.getComments()
        },

        data() {
            return {
                comments: []
            }
        },

        methods: {
            getComments:() => {
                var id = window.location.pathname
                id = id.split('/');
                id = id[2];

            },

            postComment: (event) => {
                event.preventDefault();
                console.log('ok');
            }
        }
    }
</script>
