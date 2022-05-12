<template>
  <div>
    <h1>Articoli</h1>
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