<template>
    <transition name="shift">
        <div class="goods-detail" v-show="pageShow" ref="goodsDetailRef">
            <div>
                <div class="image-header">
                    <img :src="food.goods_img" alt="">
                </div>

                <div class="title-content">
                    <div class="name">{{food.goods_name}}</div>
                    <div class="detail">
                        <div class="count">月售9999份</div>
                        <div class="rating">好评率100%</div>
                    </div>

                    <div class="price">
                        <span class="now">￥{{food.price}}</span>
                        <span class="old" v-show="food.old_price">￥{{food.old_price}}</span>
                    </div>

                    <div class="control">
                        <cart-control :food="food" @drop="drop"></cart-control>
                    </div>

                    <transition name="fade">
                        <div class="buy" @click.stop.prevent="addFirst" v-show="!food.count || food.count===0">
                            加入购物车
                        </div>
                    </transition>
                </div>

                <!-- 横线分隔条 -->
                <cross-line></cross-line>

                <!-- 商品介绍 -->
                <div class="introduce" v-show="food.body">
                    <h1 class="title">商品介绍</h1>
                    <div class="desc" v-html="food.body"></div>
                </div>

                <!-- 横线分隔条 -->
                <cross-line></cross-line>
            </div>
            <div class="back" @click="hide">
                <i class="icon-arrow_lift"></i>
            </div>
        </div>
    </transition>
</template>
<script>
    import CrossLine from '../../base/cross-line/cross-line.vue'
    import CartControl from '../../base/cart-control/cart-control.vue'
    import BScroll from 'better-scroll'
    export default {
        components: {
          CrossLine,
            CartControl
        },
        data(){
            return {
                pageShow:false,
            }
        },
        props: {
            food: {
                type:Object
            }
        },
        methods:{
            show:function(){
                this.pageShow = true;

                // 初始化 better-scroll
                this.$nextTick(() => {
                    if (!this.scroll) {
                        this.scroll = new BScroll(this.$refs.goodsDetailRef, {
                            click: true
                        })
                    } else {
                        this.scroll.refresh()
                    }
                })
            },
            hide () {
                this.pageShow = false
            },
            addFirst:function (event) {
                if(!event._constructed) {
                    return;
                }
                Vue.set(this.food,'count',1);

                this.$emit('drop',event.target)
            },
            drop(target){
                this.$emit('drop',target)
            },

        },

    }
</script>
<style lang="scss" scoped>
    @import '../../../../sass/const.scss';
    @import '../../../../sass/mixin.scss';
    .goods-detail {
        position: fixed;
        left: 0;
        top: 0;
        bottom: 48px;
        width: 100%;
        background-color: #fff;
        z-index: 30;
        transform: translate3d(0, 0, 0);
        background-color: #fff;
        overflow: hidden;
        &.shift-enter-active, &.shift-leave-active {
            transition: all 0.2s linear;
        }
        &.shift-enter, &.shift-leave-to {
            opacity: 0;
            transform: translate3d(100%, 0, 0);
        }
        // 商品图片
        .image-header {
            // 制作一个宽高相等的容器
            position: relative;
            width: 100%;
            height: 0;
            padding-top: 100%;
            img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
        }
        // 标题信息
        .title-content {
            position: relative;
            padding: 18px;
            .name {
                line-height: 14px;
                margin-bottom: 8px;
                font-size: 14px;
                font-weight: 700;
                color: rgb(7, 17, 27);
            }
            .detail {
                margin-bottom: 18px;
                line-height: 25px;
                height: 10px;
                font-size: 0;
                .count {
                    display: inline-block;
                    font-size: 10px;
                    color: rgb(147, 153, 159);
                }
                .rating {
                    display: inline-block;
                    font-size: 10px;
                    color: rgb(147, 153, 159);
                    margin-left: 12px;
                }
            }
            .price {
                font-weight: 700;
                line-height: 24px;
                .now {
                    margin-right: 8px;
                    font-size: 14px;
                    color: rgb(240, 20, 20);
                }
                .old {
                    font-size: 10px;
                    text-decoration: line-through;
                    color: rgb(147, 153, 159);
                }
            }
            .control {
                position: absolute;
                right: 12px;
                bottom: 12px;
            }
            .buy {
                position: absolute;
                right: 18px;
                bottom: 28px;
                height: 24px;
                line-height: 24px;
                padding: 0 12px;
                box-sizing: border-box;
                font-size: 10px;
                border-radius: 12px;
                color: #333;
                background-color: #FFD161;
                z-index: 10;
                &.fade-enter-active, &.fade-leave-active {
                    transition: all 0.4s linear;
                }
                &.fade-enter, &.fade-leave-to {
                    opacity: 0;
                }
            }
        }
        // 商品介绍
        .introduce {
            padding: 18px;
            .title {
                line-height: 14px;
                margin-bottom: 6px;
                font-size: 14px;
                color: rgb(7, 17, 27);
            }
            .desc {
                padding: 0 8px;
                font-size: 12px;
                font-weight: 200;
                line-height: 24px;
                color: rgb(77, 85, 93);
            }
        }
        // 商品评价
        .ratings {
            padding-top: 18px;
            .title {
                line-height: 14px;
                margin-left: 18px;
                font-size: 14px;
                color: rgb(7, 17, 27);
            }
            .ratings-wrapper {
                padding: 0 18px;
                .ratings-item {
                    position: relative;
                    padding: 16px 0;
                    border-bottom: 1px solid rgba(7, 17, 27, 0.1);
                    .user {
                        position: absolute;
                        top: 16px;
                        right: 0;
                        line-height: 12px;
                        .name {
                            display: inline-block;
                            vertical-align: top;
                            font-size: 10px;
                            color: rgb(147, 153, 159);
                            margin-right: 6px;
                        }
                        img {
                            width: 12px;
                            height: 12px;
                            border-radius: 50%;
                        }
                    }
                    .time {
                        margin-bottom: 6px;
                        line-height: 12px;
                        font-size: 10px;
                        color: rgb(147, 153, 159);
                    }
                    .text {
                        line-height: 16px;
                        font-size: 12px;
                        color: rgb(7, 17, 27);
                        .icon-thumb_up {
                            line-height: 24px;
                            margin-right: 4px;
                            font-size: 12px;
                            color: rgb(0, 160, 220);
                        }
                        .icon-thumb_down {
                            line-height: 24px;
                            margin-right: 4px;
                            font-size: 12px;
                            color: rgb(147, 153,159);
                        }
                    }
                }
                .no-rating {
                    padding: 16px 0;
                    font-size: 12px;
                    color: rgb(147, 153, 159);
                }
            }
        }
        // 返回按钮
        .back {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            background-color: rgba(7, 17, 27, 0.5);
            border-radius: 50%;
            i {
                display: block;
                padding: 10px;
                font-size: 20px;
                color: #fff;
            }
        }
    }
</style>