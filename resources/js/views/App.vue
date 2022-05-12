<template>
  <div>
      <header>
          <ul>
              <li>Home</li>
              <li>Posts</li>
              <li>Contact</li>
          </ul>
      </header>
      <div>
          <PostsIndex/>

      </div>
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