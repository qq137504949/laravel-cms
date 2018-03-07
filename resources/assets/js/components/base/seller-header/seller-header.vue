<!--商家头部组件-->
<template>
    <div class="seller-header" >
        <div class="content-wrapper">
            <div class="header">
                <div class="left" @click="back">
                    <i class="icon-arrow_lift"></i>
                </div>
                <div class="right">
                   <i class="icon-favorite"></i>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="avatar">
                <img :src="store.logo" alt="">
            </div>
            <div class="content">
                <div class="title">
                    <span class="name">{{store.store_name}}</span>
                </div>
                <div class="description">
                    <span>起送¥{{store.min_price}} / 40分钟送达</span>
                </div>
                <!--活动-->
                <div class="supports">
                    <span class="icon decrease"></span>
                    <span class="text">活动买一送一</span>
                </div>
            </div>
        </div>

        <div class="supports-count">
            <span>5个活动</span>
            <i class="icon-keyboard_arrow_right"></i>
        </div>

        <!--公告-->
        <div class="bulletin-wrapper">
            <span class="brand"></span>
            <span class="text">{{store.bulletin}}</span>
            <i class="icon-keyboard_arrow_right"></i>
        </div>
        <div class="background">
            <img :src="store.logo" alt="">
        </div>
    </div>
</template>
<script>
    export default {
        props:{
           store:{
               type:Object
           }
        },
        components:{

        },
        data(){
            return {

            }
        },
        methods:{
            back(){
               this.$router.push({
                   path:'/index'
               })
            }
        }
    }
</script>
<style lang="scss">
    @import "../../../../sass/const";
    @import "../../../../sass/mixin";
    .seller-header {
        position: relative;
        color: #fff;
        line-height: 1;
        font-size: 13px;
        overflow: hidden;
        font-weight: 200;
        background-color: rgba(7,17,27,.5);
        .content-wrapper {
            position: relative;
            font-size:0;
            .header {
                width: 100%;
                font-size: 15px;
                .left {
                    float: left;
                    padding:15px 0 5px 15px;
                }
                .right {
                    float: right;
                    padding:15px 15px 5px 0;
                    font-size:20px;
                }
            }
            .avatar {
                display: inline-block;
                font-size: 14px;
                vertical-align: top;
                padding:0 12px 18px 24px;
                img {
                    width: 64px;
                    height: 64px;
                    border-radius:4px;
                }
            }
            .content {
                display: inline-block;
                .title {
                    margin:2px 0 8px 0;
                }
                .name {
                    margin-left: 6px;
                    font-size: 16px;
                    line-height: 18px;
                    font-weight:bold;
                }
            }
            .description {
                margin-bottom: 10px;
                font-size: 13px;
                line-height:13px;
            }
            .supports {
                .icon {
                    display: inline-block;
                    width: 12px;
                    height: 12px;
                    margin-right: 4px;
                    -webkit-background-size: 12px 12px;
                    background-size: 12px 12px;
                    background-repeat:no-repeat;
                    vertical-align: top;
                    &.decrease {
                        @include bg-image('./img/decrease_1');
                    }
                    &.discount {
                        @include bg-image('./img/discount_1');
                    }
                    &.guarantee {
                        @include bg-image('./img/guarantee_1');
                    }
                    &.invoice {
                        @include bg-image('./img/invoice_1');
                    }
                    &.special {
                        @include bg-image('./img/special_1');
                    }
                }
                .text {
                    font-size: 10px;
                    line-height:12px;
                }

            }
        }
        .background {
            position: absolute;
            top:0;
            left:0;
            z-index:-1;
            width: 100%;
            height: 100%;
            img {
                width:100%;
                height: 100%;
                filter:blur(10px)
            }

        }
        .supports-count {
            position: absolute;
            right: 12px;
            bottom: 48px;
            padding:0 8px;
            height: 24px;
            line-height: 24px;
            text-align: center;
            -webkit-border-radius: 14px;
            -moz-border-radius: 14px;
            border-radius: 14px;
            background-color: rgba(0,0,0,0.2);
            span {
                font-size: 10px;
                line-height:24px;
            }
            i {
                position: relative;
                top: 1px;
                font-size: 10px;
                margin-left: 2px;
                line-height: 24px;
            }
        }
        .bulletin-wrapper {
            position:relative;
            height: 28px;
            line-height: 28px;
            padding:0 22px 0 12px;
            background-color: rgba(7,17,27,0.2);
            @include ellipsis(1);
            .brand {
                display: inline-block;
                width: 22px;
                height: 12px;
                @include bg-image('./img/bulletin');
                -webkit-background-size: 22px 12px;
                background-size: 22px 12px;
                background-repeat:no-repeat;
                vertical-align: top;
                margin-top: 7px;
            }
            i {
                position: absolute;
                top: 8px;
                right: 12px;
                font-size: 10px;
            }
        }
    }
</style>