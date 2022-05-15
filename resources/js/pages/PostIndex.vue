<template>
  <div  class="container bg-zinc-800 min-h-screen rounded-xl">
     

    <div
      class="
        container
        grid grid-cols-2
        md:grid-cols-3
        lg:grid-cols-4
        gap-12
        p-12

      "
    >   

     <div v-show="posts == false" v-for="el in 12" :key="el" class="flex justify-center items-center py-24">


          <div class="spinner"></div>
      </div>
      <PostCard  v-for="post in posts" :key="post.id" :post="post" />
    </div>
    <ul class="flex justify-center container gap-x-12 py-8">
      <li class="" v-for="n in lastPage" :key="n">
        <span
          :class="[
            currentPage === n ? 'bg-orange-400' : 'bg-white/30',
            'h-10 w-10 dot rounded-full justify-center items-center flex cursor-pointer',
          ]"
          @click="chiamataPost(n)"
        >
          {{ n }}</span
        >
      </li>
    </ul>
  </div>
</template>

<script>
import PostCard from "../components/PostCard.vue";

export default {
  components: {
    PostCard,
  },
  data() {
    return {
      posts: [],
      currentPage: 1,
      lastPage: 0,
      
    };
  },
  methods: {
    chiamataPost(page = 1) {
      axios
        .get("/api/posts", {
          params: {
            page,
          },
        })
        .then((res) => {
          console.log(res.data);
          const { posts } = res.data;
          const { data, current_page, last_page } = posts;
          this.posts = data;
          this.currentPage = current_page;
          this.lastPage = last_page;
        })
        .catch((err) => {
          console.warn(err);
        });
    },
  },
  mounted() {
    this.chiamataPost();
  },
};
</script>

<style>
</style>