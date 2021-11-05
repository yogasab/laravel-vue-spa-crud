<template>
  <div>
    <v-list-item two-line>
      <v-list-item-content>
        <v-list-item-title>
          <h1>Categories</h1>
        </v-list-item-title>
      </v-list-item-content>
    </v-list-item>
    <v-divider></v-divider>
    <v-list dense>
      <v-list-item
        v-for="category in categories"
        :key="category.title"
      >
      <v-list-item-content>
        <v-list-item-title>{{ category.name }}</v-list-item-title>
      </v-list-item-content>
      </v-list-item>
    </v-list>
  </div>
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