<template>
  <v-card>
    <v-container fluid>
      <v-card-title>
        <div>
          <div class="headline">
            {{ data.title }}
          </div>
          <span class="grey--text"> {{ data.user }} said {{ data.created_at }} </span>
        </div>
        <v-spacer/>
        <v-btn color="yellow">5 Replies</v-btn>
      </v-card-title>
      <v-card-text v-html="data.body"/>
      <v-container>
        <iframe 
          width="560" 
          height="315" 
          src="https://www.youtube-nocookie.com/embed/xcJtL7QggTI" 
          title="YouTube video player" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
          allowfullscreen>
        </iframe>
      </v-container>
      <v-card-actions>
        <v-btn @click="edit" small color="yellow">
          Edit
        </v-btn>
        <v-btn @click="destroy" small color="red">
          Delete
        </v-btn>
      </v-card-actions>
    </v-container>
  </v-card>
</template>

<script>
import Axios from 'axios'
export default {
  props: ['data'],
  methods: {
    destroy(){
      Axios.delete(`/api/question/${this.data.slug}`)
      .then(res => {
        this.$router.push('/forum')
      })
      .catch(err => console.log(err.response.data))
    },
    edit(){
      EventBus.$emit('editQuestion');
    }
  },
  mounted(){
    // console.log(this.data);
  }
}
</script>