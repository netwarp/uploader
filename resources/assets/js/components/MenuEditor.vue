<template>
    <form action="/admin/menu/0" method="POST">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="items" :value="stringify">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Menu: <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" placeholder="Enter new item" v-model="newItem" @keydown.enter.prevent="addItem">
                    <br>
                    <ul class="list-group">
                        <li class="list-group-item" v-for="item in items | orderBy 'item'">
                            <span v-text="item"></span>
                            <button type="button" class="btn btn-dark btn-xs pull-right" @click="removeItem(item)">Remove</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
    export default {
        mounted() {
            this.fetchitems()
        },

        props: [],

        data() {
            return {
                items: []
            }
        },

        methods: {
            addItem: function() {
                var item = this.newItem
                if (item) {
                    this.items.push(item)
                }


                this.newItem = ''
            },

            removeItem: function(item) {
                this.items.$remove(item)
            },

            fetchitems: function() {
                this.$http.get('{{ route('admin.fetch-menu') }}').then(function(response) {
                    var data = JSON.parse(response.data)

                    this.items = data
                })
            },

            computed: {
                stringify: function() {
                    return JSON.stringify(this.items)
                }
            }
        }
    }
</script>