<template>
  <v-toolbar>
    <v-toolbar-title>Single Forum App</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link v-for="item in items" :to="item.to" :key="item.title">
        <v-btn v-if="item.show">{{ item.title }}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>

<script>
import User from '../helpers/User'
export default {
  data(){
    return {
      items: [
        {title: 'Forum', to: '/forum', show: true},
        {title: 'Login', to: '/login', show: !User.loggedIn()},
        {title: 'Register', to: '/register', show: !User.loggedIn()},
        {title: 'Logout', to: '/logout', show: User.loggedIn()},
        {title: 'Ask Question', to: '/ask', show: User.loggedIn()},
        {title: 'Category', to: '/category', show: User.admin()},
      ]
    }
  },
  created(){
    EventBus.$on('logout', () => {
      User.loggedOut();
    })
  }
}
</script>