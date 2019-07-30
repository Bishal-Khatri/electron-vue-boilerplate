<template>
    <div id="app">
        <b-nav tabs align="center">
            <b-nav-item :active="getActiveRoute('login')"><b-link to="/login">Login</b-link></b-nav-item>
            <b-nav-item :active="getActiveRoute('home')"><b-link to="/">Home</b-link></b-nav-item>
            <b-nav-item :active="getActiveRoute('about')"><b-link to="/about">About</b-link></b-nav-item>
        </b-nav>
        <b-container class="mt-4">
            <router-view/>
        </b-container>
    </div>
</template>

<script>
    export default {
        methods:{
            getActiveRoute(path){
                if (path==this.$route.name){
                    return true
                }
            }
        }
    }
</script>
<style>

</style>
