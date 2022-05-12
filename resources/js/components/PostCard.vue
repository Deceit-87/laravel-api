<template>
<div class="container">
    
      
    
    
    

    <div class="container opacity-50 hover:opacity-100 rounded hover:bg-zinc-600 rounded-lg overflow-hidden text-white p-1">
    
        <img class="rounded-md" :src="post.cover" alt="">
        <h4>
            {{post.title}}
        </h4>
        <p v-if="post.category">{{post.category.name}}</p>
        <p>{{post.content}}</p>
    
    
    </div>
    
</div>
</template>

<script>
export default {
    props:{
        post:{
            type: Object,
            required: false,

        }
    }

}
</script>

<style>

</style>