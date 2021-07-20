<template>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posts</div>

                <div class="card-body">
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
                                        <span v-show="!editForm(post.id)">{{post.title}}</span>
                                        <input  v-show="editForm(post.id)" type="text" class="form-control" :placeholder="post.title" v-model="edit_form.title" name="title" id="title">
                                    </td>
                                    <td>
                                        <span v-show="!editForm(post.id)">{{post.description}}</span>
                                        <textarea class="form-control" name="description" v-show="editForm(post.id)" v-model="edit_form.description" id="description" rows="4"></textarea>
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-sm" v-show="!editForm(post.id)"  @click="edit(post.id, post.title, post.description)">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" v-show="!editForm(post.id)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        <button class="btn btn-success btn-sm" v-show="editForm(post.id)">
                                            <i class="fas fa-check"></i>
                                        </button>
                                        <button class="btn btn-danger btn-sm" v-show="editForm(post.id)" @click="edit(null)">
                                            <i class="fas fa-times-circle"></i>
                                        </button>
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
    components: {},
    data() {
        return {
            // editing form
            editing: false,
            edit_form: {
                id:'',
                title: '',
                description: '',
            },
        }
    },
    mounted() {
    },
    methods: {
        update() {

        },
        delete() {

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
