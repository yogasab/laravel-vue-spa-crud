<template>
  <v-card class="mx-auto">
    <v-toolbar dark>
      <v-toolbar-title>Categories</v-toolbar-title>
      <v-spacer></v-spacer>
    </v-toolbar>
    <v-card tile v-for="(category, index) in categories" :key="category.id">
      <v-list-item>
        <v-list-item-content>
          <v-list-item-title><strong>{{ category.name }}</strong></v-list-item-title>
        </v-list-item-content>
      </v-list-item>
      <v-divider></v-divider>
    </v-card>
  </v-card>
</template>

<script>
import Axios from 'axios'
export default {
  data(){
    return {
      categories: {},
    }
  },
  mounted(){
    Axios.get('/api/category')
    .then(res => this.categories = res.data.data)
    .catch(err => console.log(err))
  }
}
</script>