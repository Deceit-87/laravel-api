<template>
  <div>
      <header class="container py-12 text-white">
          <ul class="flex gap-x-1.5 justify-center text-2xl">
              <li>Home</li>
              <li>Posts</li>
              <li>Contact</li>
          </ul>
      </header>
      
            <router-view></router-view>

     
      <footer>
          &copy; Boolpress 2022
      </footer>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>