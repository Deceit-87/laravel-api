<template>
  <div>
      <header class="container py-12 text-white">
          <ul class="flex gap-x-1.5 justify-center text-2xl">
              <li>Home</li>
              <li>Posts</li>
              <li>Contact</li>
          </ul>
      </header>
      
          <PostsIndex/> 

     
      <footer>
          &copy; Boolpress 2022
      </footer>
  </div>
</template>

<script>
import PostsIndex from './PostIndex'
export default {

    components:{
        PostsIndex,
    }

}
</script>

<style>

</style>