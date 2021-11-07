<template>
  <v-form @submit.prevent="submit">
    <v-container>
      <v-col cols="12" sm="6" md="12">
        <v-text-field 
          label="Category"
          required
          type="text"
          v-model="form.name"/>
        <v-btn type="submit">
          Create
        </v-btn>
      </v-col>

      <v-card class="mx-auto">
        <v-toolbar dark>
          <v-toolbar-title>Categories</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-card tile v-for="(category, index) in categories" :key="category.id">
          <v-list-item>
            <v-btn x-small color="yellow" class="mr-5">
              Edit
            </v-btn>
            <v-list-item-content>
              <v-list-item-title><strong>{{ category.name }}</strong></v-list-item-title>
            </v-list-item-content>
            <v-btn x-small color="red" @click="destroy(category.slug, index)">
              Delete
            </v-btn>
          </v-list-item>
          <v-divider></v-divider>
        </v-card>
      </v-card>
    </v-container>
  </v-form>
</template>

<script>
import Axios from 'axios'
import User from '../../helpers/User';
export default {
  data(){
    return {
      form: {
        name: null
      },
      categories: {},
    }
  },
  methods: {
    submit(){
      axios.post("/api/category", this.form)
        .then(res => {
          this.categories.unshift(res.data.data);
          // console.log(res.data.data);
          this.form.name = null;
        })
        .catch(error => (this.errors = error.response.data.errors));
    },
    destroy(slug, index){
      Axios.delete(`/api/category/${slug}`)
        .then(res => this.categories.splice(index, 1))
        .catch(err => console.log(err.data))
    }
  },
  created(){
    if(!User.admin()){
      this.$router.push('/forum');
    }
    Axios.get('/api/category')
      .then(res => this.categories = res.data.data)
      .catch(err => console.log(err.data))
  }
}
</script>