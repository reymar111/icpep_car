<template>
<div class="container">
    <div class="row justify-content-center">
        <table-component :posts="posts"></table-component>
        <create-component @getPosts="getData"></create-component>
    </div>
</div>
</template>

<script>
import create_component from './create.vue'
import table_component from './table.vue'

export default {
    props: [],
    components: {
        'create-component': create_component,
        'table-component': table_component,
    },
    data() {
        return {
            posts: []
        }
    },
    mounted() {
        this.getData()
    },
    methods: {
        getData() {
            axios.get('/posts')
            .then(res => {
                this.posts = res.data.posts
            })
            .catch(err => {
                console.log(err)
            })
        }
    }
}
</script>
