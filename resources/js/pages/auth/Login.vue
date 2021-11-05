<template>
  <v-form @submit.prevent="login">
    <v-container>
      <v-col
        cols="12"
        sm="6"
        md="12"
        >
        <h3>Login</h3>
        <v-text-field label="Email" required type="email" v-model="form.email">
        </v-text-field>
        <v-text-field label="Password" required type="password" v-model="form.password">
        </v-text-field>
        <v-btn type="submit" color="green">
          Login
        </v-btn>
        <router-link to="/register">
          <v-btn color="blue">
            Register
          </v-btn>
        </router-link>
      </v-col>
    </v-container>
  </v-form>
</template>

<script>
import User from '../../helpers/User'
export default {
  data(){
    return {
      form: {
        email: null,
        password: null
      }
    }
  },
  methods: {
    login(){
      User.login(this.form)
      // this.$router.push({name: 'forum'})
    }
  },
  created(){
    if(User.loggedIn()){
      this.$router.push({name: 'forum'})
    }
  }
}
</script>