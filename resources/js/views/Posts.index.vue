<template>
  <div>
      <div class="container">
          <div v-for="post in Posts" :key="post.id">

              {{ post.title }}

          </div>
      </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            posts:[]
        }
    },
    methods:{
        fetchPosts({
          

        })
    },
    mounted(){
        this.fetchPosts();
    }

}
</script>

<style>

</style>