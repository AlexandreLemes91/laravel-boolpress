<template>
    <header>
        <nav>
            <ul>
                <li><router-link :to="{name:'home'}">Home</router-link></li>
                <li><router-link :to="{name:'blog'}">Blog</router-link></li>
            </ul>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang='scss' scoped>
header{
    padding: 20px 0;
    margin-bottom: 30px;
    background-color:lightsteelblue;

    .active{
        color: red;
    }
}
</style>