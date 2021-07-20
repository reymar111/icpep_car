<template>
<div class="col-md-4">

    <div class="card">
        <div class="card-header">Create Post</div>

        <div class="card-body">
                <div class="alert alert-success" v-if="success_alert">
                    Your Post is updated
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="success_alert=false">
                        <span aria-hidden="true" style="font-size:20px">×</span>
                    </button>
                </div>

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" v-model="values.title" name="title" id="title">
                    <div class="text-danger" v-if="errors.title">This field is required</div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" v-model="values.description" id="description" rows="4"></textarea>
                    <div class="text-danger" v-if="errors.description">This field is required</div>
                </div>

                <input type="submit" name="send" value="Submit" @click="save()" class="btn btn-dark btn-block">
            </form>
        </div>
    </div>
</div>
</template>

<script>

export default {
    data() {
        return {
            values: {
                title: '',
                description: '',
            },

            errors: {
                title: false,
                description: false,
            },

            success_alert: false,
        }
    },
    mounted() {

    },
    methods: {
        save() {
            axios.post('/posts', this.values)
            .then(res => {
                this.$emit('getPosts')
                this.values.title = ''
                this.values.description = ''
                this.success_alert = true
            })
            .catch(err => {
                this.errors.title = err.response.data.errors.title != undefined ? true : false
                this.errors.description = err.response.data.errors.description != undefined ? true : false
            })
        },
    }
}
</script>
