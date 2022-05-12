<template>
   
        
          <div class="container grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12 bg-zinc-800 p-12">
        <PostCard v-for="post in posts" :key="post.id" :post="post"/>
          </div>
 
</template>

<script>
import PostCard from '../components/PostCard.vue'

export default {
    components:{
        PostCard
    },
  data() {
    return {
      posts: [],
    };
  },
  methods:{
      chiamataPost(){
          axios.get('/api/posts')
      .then( res => {
          console.log(res.data)
        const { posts } = res.data
        this.posts = posts
        
      })
      .catch( err => {
        console.warn(err)
      })
  },
  },
  mounted(){
      this.chiamataPost();
  }
}
</script>

<style>
</style>