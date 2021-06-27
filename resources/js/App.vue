<template>

    <div class="container">
        <Header />

       <router-view></router-view>

    </div>
</template>

<script>
import Header from './components/Header.vue';

export default {
    name: 'App',

    components: {
        Header,
    },
}
</script>

<style lang='scss'>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.container{
    margin: auto;
    max-width: 1170px;
}

ul{
    display: flex;
    list-style: none;

    li{
        margin: 0 10px;
    }
}

nav{
    margin-top: 20px;

    .active{
        background-color: aquamarine;
    }
}

button{
    padding: 3px;
}


</style>