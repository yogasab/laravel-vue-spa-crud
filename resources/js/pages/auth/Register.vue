<template>
  <v-form @submit.prevent="signUp">
    <v-container>
      <v-col
        cols="12"
        sm="6"
        md="12"
        >
        <h3>Register</h3>
        <v-text-field label="Name" required type="text" v-model="form.name"/>
        <span class="red--text" v-if="errors.name">Name field is required</span>
        <v-text-field label="Email" required type="email" v-model="form.email"/>
        <span class="red--text" v-if="errors.email">{{ errors.email }}</span>
        <v-text-field label="Password" required type="password" v-model="form.password"/>
        <span class="red--text" v-if="errors.password">{{ errors.password }}</span>
        <v-text-field label="Confirmation Password" required type="password" v-model="form.password_confirmation"/>
        <v-btn type="submit" color="blue">
          Register
        </v-btn>
        <router-link to="/login">
          <v-btn color="green">
            Login
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
        name: null,
        email: null,
        password: null,
        password_confirmation: null
      },
      errors: {}
    }
  },
  methods: {
    signUp(){
      axios.post('/api/auth/register', this.form)
      .then(res => {
        User.responseAfterLogin(res)
        this.$router.push({name: 'forum'})
      })
      .catch(err => this.errors = err.response.data.errors)
    }
  },
  created(){
    if(User.loggedIn()){
      this.$router.push({name: 'forum'})
    }
  }
}
</script>