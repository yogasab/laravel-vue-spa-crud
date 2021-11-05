<template>
  <div>
    <app-toolbar></app-toolbar>
    <router-view></router-view>
    <app-footer></app-footer>
  </div>
</template>

<script>
import AppFooter from './AppFooter.vue'
import AppToolbar from './AppToolbar.vue'
export default {
  components: { AppToolbar, AppFooter },
  
}
</script>

<style scoped>

</style>