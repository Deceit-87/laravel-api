<template>
<div>
    <img :src="post.cover" alt="">
    <h4>
        {{post.title}}
    </h4>
    <p>{{post.content}}</p>
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