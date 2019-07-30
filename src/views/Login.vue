<template>
    <v-layout column align-center>
        <v-card  min-width="600" class="mx-auto p-4 mt-5">
            <v-img
                    class="white--text text-center"
                    height="200px"
                    width="600px"
                    src="https://cdn.vuetifyjs.com/images/cards/docks.jpg"
            ></v-img>
            <v-card-title  justify-center>Enter Login Credential</v-card-title>
            <v-card-text>
            <v-form ref="form" v-model="valid" :lazy-validation="lazy">

                <v-text-field
                        v-model="email"
                        :rules="emailRules"
                        label="E-mail"
                        required>
                </v-text-field>

                <v-text-field
                        v-model="password"
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min]"
                        :type="show1 ? 'text' : 'password'"
                        name="input-10-1"
                        label="Password"
                        hint="At least 8 characters"
                        counter
                        @click:append="show1 = !show1"
                ></v-text-field>

                <v-checkbox
                        v-model="checkbox"
                        :rules="[v => !!v || 'You must agree to continue!']"
                        label="Remember me?"
                        required
                ></v-checkbox>

                <v-btn
                        :disabled="!valid"
                        color="success"
                        class="mr-4"
                        @click="login">
                    Login
                </v-btn>
            </v-form>
            </v-card-text>
        </v-card>
    </v-layout>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return{
                email:'',
                password:'',
                show1: false,
                rules: {
                    required: value => !!value || 'Required.',
                    min: v => v.length >= 8 || 'Min 8 characters',
                    emailMatch: () => ('The email and password you entered don\'t match'),
                },
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
