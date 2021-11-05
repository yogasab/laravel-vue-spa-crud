<template>
  <v-container>
    <v-form @submit.prevent="submit">
      <v-text-field 
        label="Title" 
        required 
        type="text" 
        v-model="form.title">
      </v-text-field>
      <v-textarea 
        name="input-7-1" 
        label="Question" 
        v-model="form.body" 
        hint="Update Question"
      ></v-textarea>
      <v-card-actions>
        <v-btn small color="teal" type="submit">
          Save
        </v-btn>
        <v-btn small color="red" @click="cancel">
          Cancel
        </v-btn>
      </v-card-actions>
    </v-form>
  </v-container>
</template>

<script>
import Axios from 'axios';
export default {
  props: ['data'],
  data(){
    return {
      form:{
        title: null,
        body: null
      }
    }
  },
  mounted(){
    this.form = this.data
  },
  methods: {
    cancel(){
      EventBus.$emit('cancelEdit');
    },
    submit(){
      Axios.patch(`/api/question/${this.data.slug}`, this.form)
      .then(res => this.cancel())
      .catch(err => console.log(err))
    }
  }
}
</script>