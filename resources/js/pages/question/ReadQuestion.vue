<template>
  <div v-if="question">
    <edit-question v-if="editing" :data=question></edit-question>
    <show-question v-else :data="question"></show-question>
  </div>
</template>

<script>
import Axios from 'axios'
import ShowQuestion from '../../components/ShowQuestion.vue';
import EditQuestion from '../../components/EditQuestion.vue';
export default {
  components: { ShowQuestion, EditQuestion },
  data(){
    return {
      question: {},
      editing: false,
    }
  },
  created(){
    this.listen();
    this.getQuestion();
  },
  methods: {
    listen(){
      EventBus.$on('editQuestion', () => {
        this.editing = true;
      })
      EventBus.$on('cancelEdit', () => {
        this.editing = false;
      })
    },
    getQuestion(){
      Axios.get(`/api/question/${this.$route.params.slug}`)
      .then(res => this.question = res.data.data)
      .catch(err => console.log(err))
    }
  }
}
</script>


