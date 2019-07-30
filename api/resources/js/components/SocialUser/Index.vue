<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">Social Users</div>

                    <div class="card-body">
                        <b-table :items="items" :fields="fields">
                            <template slot="is_active" class="text-center" slot-scope="row">
                                <span v-if="row.item.is_active"> <b-badge variant="success">online</b-badge></span>
                                <span v-else> <b-badge variant="secondary">offline</b-badge></span>
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data(){
            return{
                fields: [
                    { key: 'name', label: 'Name' },
                    { key: 'total_time', label: 'Total Time (m)', class:'text-center' },
                    { key: 'total_coins', label: 'Total Coins', class:'text-center' },
                    { key: 'is_active', label: 'Status', class:'text-center' },
                ],
                items: []
            }
        },
        methods:{
            getLinks(){
                axios.get('social_user/list')
                    .then(response=> {
                        this.items = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        },
        mounted() {
            this.getLinks()
        }
    }
</script>
