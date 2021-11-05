<template>
  <v-container fluid grid-list-md>
    <v-layout row wrap>
      <v-flex xs8>
        <question style="margin-bottom: 10px;"
          v-for="question in questions" 
          :key="question.slug"
          :data=question
        >
        </question>
      </v-flex>
      <v-flex>
        <v-list-item two-line>
          <v-list-item-content>
            <v-list-item-title>Categories</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-divider></v-divider>
        <v-list dense>
          <v-list-item
            v-for="item in items"
            :key="item.title"
          >
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import Axios from 'axios'
import question from '../../components/Question.vue'
export default {
  components: {
    question
  },
  data(){
    return {
      questions: {},
      items: [
          { title: 'Personal'},
          { title: 'Programming' },
          { title: 'Cars' },
      ],
    }
  },
  created(){
    Axios.get('api/question')
    .then(res => this.questions = res.data.data)
    .catch(err => console.log(err))
  }
}
</script>