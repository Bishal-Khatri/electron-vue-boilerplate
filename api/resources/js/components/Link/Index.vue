<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">Links <b-button v-b-modal.modal-center class="float-right" size="sm" variant="primary">Add</b-button></div>

                    <div class="card-body">
                        <b-table :items="items" :fields="fields">
                            <template slot="actions" class="text-center action" slot-scope="row">
                                <b-button size="sm" variant="primary" @click="info(row.item, row.index, $event.target)">
                                    Edit
                                </b-button>
                                <b-button size="sm" variant="danger" @click="info(row.item, row.index, $event.target)">
                                    Delete
                                </b-button>
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>
        </div>

        <!--ADD MODAL-->
        <b-modal id="modal-center"
                 title="Submit Your Name"
                 @show="resetModal"
                 @hidden="resetModal"
                 @ok="saveLinks"
                 ok-title="Save">
            <form>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" v-model="title" aria-describedby="emailHelp" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" v-model="price" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label>Link</label>
                    <input type="text" class="form-control" v-model="link" placeholder="Enter link">
                    <small class="form-text text-muted">Enter full link. Eg: https://example.com</small>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" v-model="description" name="description" id="" cols="30" rows="10"></textarea>
                </div>
            </form>
        </b-modal>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data(){
            return{
                title: '',
                price:'',
                link: '',
                description: '',
                fields: [
                    { key: 'title', label: 'Title' },
                    { key: 'price', label: 'Price' },
                    { key: 'link', label: 'Link' },
                    { key: 'description', label: 'Description' },
                    { key: 'created_at', label: 'Created Date' },
                    { key: 'actions', label: 'Actions' }
                ],
                items: []
            }
        },
        methods:{
            getLinks(){
                axios.get('link/list')
                    .then(response=> {
                        this.items = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            saveLinks(){
                axios.post('link/save',{
                    'title': this.title,
                    'price': this.price,
                    'link': this.link,
                    'description': this.description
                })
                    .then(response=> {
                        this.getLinks()
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            resetModal(){
                this.title = '';
                this.price = '';
                this.link =  '';
                this.description =  '';
            }
        },
        mounted() {
            this.getLinks()
        }
    }
</script>
<style scoped>
    .action{
        width: 70px !important;
    }
</style>
