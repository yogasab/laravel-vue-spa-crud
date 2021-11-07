import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../pages/auth/Login.vue'
import Register from '../pages/auth/Register.vue'
import Logout from '../pages/auth/Logout.vue'
import Forum from '../pages/question/Forum.vue'
import ReadQuestion from '../pages/question/ReadQuestion.vue'
import CreateQuestion from '../pages/question/CreateQuestion.vue'
import CreateCategory from '../pages/category/CreateCategory.vue'

Vue.use(VueRouter)

const routes = [
  {path: '/login', component: Login},
  {path: '/register', component: Register},
  {path: '/logout', component: Logout, name: 'logout'},
  {path: '/forum', component: Forum, name: 'forum'},
  {path: '/category', component: CreateCategory},
  {path: '/ask', component: CreateQuestion},
  {path: '/question/:slug', component: ReadQuestion, name: 'read'},
]

const router = new VueRouter({
  routes,
  mode: 'history',
})

export default router