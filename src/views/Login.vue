<template>
    <div class="login">
        <b-container>
            <b-row>
                <b-col offset-md="3" class="login-card text-center" align-self="center">
                    <b-card title="Login" style="max-width: 20rem;" class="card mb-2">
                        <b-form-input type="email" v-model="email" class="m-2" placeholder="Email"></b-form-input>
                        <b-form-input type="password" v-model="password" class="m-2" placeholder="Password"></b-form-input>

                        <b-button @click="login" variant="outline-secondary" squared class="mt-4">Login</b-button>
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return{
                email:'',
                password:''
            }
        },
        methods:{
            login(){
                alert('clicked')
            }
        }
    }
</script>

<style scoped>
    .login-card{
        margin-top: 100px;
    }
    .card{
        border-radius: 0px;
    }
</style>