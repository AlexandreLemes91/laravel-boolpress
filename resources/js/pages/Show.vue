<template>
    <div>
        <div v-if="post">
            <h1>{{ post.title }}</h1>
            <h3>{{ post.category.name }}</h3>
            <div>
                <h4 v-if="post.tags.length > 0" >TAGS:</h4>
                <h5 v-for="tag in post.tags" :key="'tag'+tag.id">{{ tag.name }}</h5>
            </div>

            <p>{{ post.content }}</p>
        </div>
        <div v-else>
            <span>Loading.................</span>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Show',

    data(){
        return{
            post: null,
        }
    },

    created(){
        this.getPostDetail();
    },

    methods: {
        getPostDetail(){
            axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
                .then(res=>{
                    console.log(res.data);
                    this.post = res.data;
                })
                .catch(err=>{
                    console.log(err);
                });
        }
    }
}
</script>

<style scoped>
h1,
h2,
h3,
h4,
h5{
    margin-bottom: 5px;
}

h4,
h5{
    display: inline-block;
    margin-right: 10px;
    margin-bottom: 30px;
}

</style>