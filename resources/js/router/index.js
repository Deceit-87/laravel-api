
import VueRouter from 'vue-router'
import Vue from 'vue'
import Posts from '../pages/PostIndex.vue'
import Contact from '../pages/Contact.vue'

Vue.use(VueRouter)

const routes = [{
    path:'/posts',
    name:'posts.index',
    component: Posts,
},
{
    path:'/contact',
    name:'contact',
    component: Contact,

}]

const router  = new VueRouter({
    mode:'history',
 routes:routes,
})

export default router