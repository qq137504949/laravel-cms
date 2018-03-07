<template>
    <div class="header-bar">
        <i class="icon-arrow_lift" v-if="flag" @click="back"></i>
        <h1>{{text}}</h1>
    </div>
</template>

<script>
    export default{
        components:{},
        data(){
            return{};
        },
        props:{
            text:{
                type:String,
                default:'主页'
            },
            flag:{
                type:Boolean,
                default:false
            }
        },
        methods:{
            back(){
                this.$emit('back');
            }
        }
    }
</script>
<style lang="scss" scoped>
@import "../../../sass/const.scss";
@import "../../../sass/mixin.scss";

.header-bar {
    position: fixed;
    top: 0px;
    width: 100%;
    height: 42px;
    line-height: 42px;
    background: #fff;
    text-align: center;
    border-bottom: 1px solid rgba(7, 17, 27, 0.1);
    z-index: 10;
    i {
        display: block;
        float: left;
        margin: 12px 0 0 15px;
    }
    h1 {
        display: inline-block;
        line-height: 44px;
        margin:-10px;
        font-size: 17px;
        color: #333;
        margin-left: -15px;
    }
}
</style>