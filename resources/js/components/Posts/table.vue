<template>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>
                <div class="card-body">

                    <div class="alert" :class="alert.type" v-if="alert.is_active">
                        {{alert.message}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="alert.is_active=false">
                            <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>
                    </div>

                    <table class= table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in posts" :key="index">
                                <td>
                                    <span v-if="!editForm(post.id)">{{post.title}}</span>
                                    <input  v-if="editForm(post.id)" type="text" class="form-control" :placeholder="post.title" v-model="edit_form.title" name="title" id="title">
                                </td>
                                <td>
                                    <span v-if="!editForm(post.id)">{{post.description}}</span>
                                    <textarea class="form-control" name="description" v-if="editForm(post.id)" v-model="edit_form.description" id="description" rows="4"></textarea>
                                </td>
                                <td>
                                    <div v-if="!editForm(post.id)">
                                        <button class="btn btn-success btn-sm"   @click="edit(post.id, post.title, post.description)">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" @click="destroy(post.id)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                    <div v-else>
                                        <button class="btn btn-success btn-sm" @click="update">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" @click="edit(null)">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</template>

<script>

export default {
    props: ['posts'],
    data() {
        return {
            // editing form
            editing: false,
            edit_form: {
                id:'',
                title: '',
                description: '',
            },
            alert: {
                is_active: false,
                message: '',
                type: ''
            },
        }
    },
    mounted() {
    },
    methods: {
        update() {
            axios.put('/posts/'+this.edit_form.id, this.edit_form)
            .then(res => {
                this.alert.type = 'alert-success'
                this.alert.message = 'Your Post is updated'
                this.alert.is_active = true
                this.$emit('getPosts')
                this.edit(null)
            })
            .catch(err => {

            })
        },
        destroy(id) {
            axios.delete('/posts/'+id)
            .then(res => {
                this.alert.type = 'alert-danger'
                this.alert.message = 'Your Post is deleted'
                this.alert.is_active = true
                this.$emit('getPosts')
                this.edit(null)
            })
            .catch(err => {

            })
        },
        edit(id, title, description) {
            this.edit_form.id = id
            this.edit_form.title = title
            this.edit_form.description = description
        },
        editForm(id) {
            if(this.edit_form.id === id) {
                return true
            }
            return false
        }
    }
}
</script>
