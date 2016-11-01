<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Menu:
                    </div>
                    <div class="panel-body">
                            <input type="text" class="form-control" v-model="newItem" @keyup.enter="addItem">
         
                        <br>
                        <ul class="list-group">
                            <li class="list-group-item" v-for="item in items">
                                {{ item }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component ready 3')

        },

        data() {
            return {
                items: ['from', 'vue'],
                newItem: 'zz'
            }
        },

        methods: {
            addItem: () => {
                console.log(this.items)
            },
        }
        
    }
</script>
