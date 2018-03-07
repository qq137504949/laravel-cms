<template>
    <div>
        <header-bar :text="title"></header-bar>
        <tab-bar></tab-bar>
    </div>
</template>
<script>
    import TabBar from '../tab-bar/tab-bar.vue'
    import HeaderBar from '../header-bar/header-bar.vue'
    export default {
        data(){
            return{
                title:'订单'
            }
        },
        components:{
            TabBar,
            HeaderBar,
        }
    }
</script>

<style></style>