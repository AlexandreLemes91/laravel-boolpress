<template>
    <div>
        <h1>Blog</h1>

        <article v-for="post in posts" :key="'post'+post.id">
            <h4>{{ post.title }}</h4>
            <span>{{ date(post.created_at) }}</span>
            <router-link :to="{name:'show', params: { slug: post.slug }}">show >></router-link>
        </article>

        <nav>
            <button @click="getPost(pagination.current -1)"
                :disabled="pagination.current === 1">
                prev
            </button>
            <button
                v-for="i in pagination.last"
                :key="'page'+i"
                @click="getPost(i)"
                :class="{'active': i == pagination.current}"
            >{{ i }}</button>
            <button @click="getPost(pagination.current +1)"
                :disabled="pagination.current === pagination.last">
                next
            </button>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Blog',

    data() {
        return{
            posts:[],
            pagination: {},
        }
    },

    created(){
        this.getPost();
    },

    methods: {
        date(date){
            const postDate = new Date(date);
            let day = postDate.getDate();
            let month = postDate.getMonth();
            const year = postDate.getFullYear();

            if( day < 10 ){
                day = '0'+day;
            }
            if( month < 10 ){
                month = '0'+month;
            }

            return `${day}/${month}/${year}`;
        },

        getPost(page = 1){
            axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(res=>{
                    console.log(res.data);
                    this.posts = res.data.posts.data;
                    console.log(this.posts);
                    this.pagination = {
                        current: res.data.posts.current_page,
                        last: res.data.posts.last_page,
                    };
                })
                .catch(err=>{
                    console.log(err);
                })
        }
    }
}
</script>

<style>

</style>