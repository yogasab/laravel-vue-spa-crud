<template>
  <v-container>
    <h1>Ask Question</h1>
    <v-form @submit.prevent="create">
    <v-container>
      <v-col cols="12" sm="6" md="12">
        <v-text-field 
          label="Title" 
          required 
          type="text" 
          v-model="form.title">
        </v-text-field>
        <v-select 
          :items="categories" 
          item-text="name" 
          item-value="id" 
          v-model="form.category_id" 
          label="Categories" 
          autocomplete>
        </v-select>
        <v-textarea 
          name="input-7-1" 
          label="Question" 
          v-model="form.body" 
          hint="Put your question here"
        ></v-textarea>
        <v-spacer></v-spacer>
        <v-btn type="submit" color="green">
          Create
        </v-btn>
      </v-col>
    </v-container>
  </v-form>
  </v-container>
</template>

<script>
import Axios from 'axios';

export default {
  data(){
    return {
      form: {
        title: null,
        category_id: null,
        body: null
      },
      categories: [],
      errror: {}
    }
  },
  async created(){
    await Axios.get('/api/category')
    .then(res => this.categories = res.data.data)
    .catch(err => console.log(err))
  },
  methods: {
    create(){
      Axios.post('/api/question', this.form)
      .then(res => {
        this.form.title = null;
        this.form.category_id = null;
        this.form.body = null;
        this.$router.push(res.data.path)
        console.log(res.data)
      })
      .catch(err => alert(err))
    }
  }
}
</script>