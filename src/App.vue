<template>
  <v-app>
    <v-navigation-drawer app v-model="drawer" v-if="auth">
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title class="title">
            Bishal Khatri
          </v-list-item-title>
          <v-list-item-subtitle>
            ADMIN
          </v-list-item-subtitle>
        </v-list-item-content>
      </v-list-item>

      <v-divider></v-divider>

      <v-list dense nav >
        <v-list-item link to="/" active-class="deep-purple--text text--accent-4">
          <v-list-item-icon>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-icon>

          <v-list-item-content >
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link to="/login" active-class="deep-purple--text text--accent-4">
          <v-list-item-icon>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-icon>

          <v-list-item-content >
            <v-list-item-title>Login</v-list-item-title>
          </v-list-item-content>
        </v-list-item>

        <v-list-item link to="/about" active-class="deep-purple--text text--accent-4">
          <v-list-item-icon>
            <v-icon>mdi-help-box</v-icon>
          </v-list-item-icon>

          <v-list-item-content >
            <v-list-item-title>About</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>

    </v-navigation-drawer>

    <v-app-bar app v-if="auth">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title class="headline text-uppercase">
        <span>Ronik </span>
        <span class="font-weight-light">Autoparts & Workshop</span>
      </v-toolbar-title>
      <v-spacer></v-spacer>
    </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <v-content>

      <!-- Provides the application the proper gutter -->
      <v-container fluid>

        <!-- If using vue-router -->
        <router-view></router-view>
      </v-container>
    </v-content>

    <v-footer app>
      <!-- -->
    </v-footer>
  </v-app>
</template>

<script>

  export default {
    name: 'App',
    components: {
    },
    data () {
      return {
        auth:true,
        drawer: true,
        group: null,
        items: [
          { title: 'Dashboard', icon: 'mdi-view-dashboard', link:'/home' },
          { title: 'Login', icon: 'mdi-image', link:'/login' },
          { title: 'About', icon: 'mdi-help-box', link:'/about' },
        ],
        right: null,
      }
    },
    watch: {
      group () {
        this.drawer = false
      },
    },
  };
</script>
