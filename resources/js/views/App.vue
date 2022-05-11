<template>
<div>
   <header>
       <ul>
           <li>Home</li>
           <li>Posts</li>
           <li>Categories</li>
       </ul>
   </header>
   <PostsGrid/>
   <footer> Boolpress 2022
       &copy;
   </footer>
</div>
  
</template>

<script>
import PostGrid from'./Posts.index.vue'
export default {
    components:{
        PostGrid,
    }

}
</script>

<style lang="scss" scoped>

</style>