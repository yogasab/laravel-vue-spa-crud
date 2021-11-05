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
      <v-flex xs4>
        <app-sidebar></app-sidebar>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
import Axios from 'axios'
import question from '../../components/question/Question.vue'
import AppSidebar from '../../components/AppSidebar.vue'
export default {
  components: {
    question,
    AppSidebar
  },
  data(){
    return {
      questions: {},
    }
  },
  created(){
    Axios.get('api/question')
    .then(res => this.questions = res.data.data)
    .catch(err => console.log(err))
  }
}
</script>