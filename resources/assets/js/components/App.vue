<template>
    <div id="app">
        <keep-alive>
            <router-view></router-view>
        </keep-alive>

    </div>
</template>
<script>
    export default {
        components:{},
        name:'app',
        mounted() {
            console.log("app")
        }
    }
</script>