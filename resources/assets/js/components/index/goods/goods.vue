<template>
    <div class="goods">
        <div class="menu-wrapper" ref="menuRef">
            <ul>
                <li  @click="selectMenu(index, $event)"  class="menu-item " :class="{'current': currentIndex === index}" v-for="(item,index) in goods" >
                    <span class="text">
                        <span class="icon" v-show="item.type>0" :class="classMap[item.type]"></span>
                        {{item.cat_name}}
                    </span>
                </li>
            </ul>
        </div>

        <!-- 右侧列表 -->
        <div class="foods-wrapper" ref="foodsRef">
            <ul>
                <li class="foods-list foods-list-hook" v-for="item in goods" ref="foodList">
                    <h1 class="title">{{item.cat_name}}</h1>
                    <ul>
                        <li class="foods-item" v-for="food in item.goods" @click="toFoodDetail(food, $event)">
                            <div class="icon">
                                <img v-lazy="food.goods_img" alt="">
                            </div>
                            <div class="content">
                                <h2 class="name">{{food.goods_name}}</h2>
                                <p class="desc">{{food.description}}</p>

                                <div class="extra">
                                    <span class="count">月销量100件</span>
                                    <!--<span class="rating">好评率100%</span>-->
                                </div>
                                <div class="price">
                                    <span class="now">¥{{food.price}}</span>
                                    <span class="old">¥{{food.old_price}}</span>
                                </div>
                                <div class="control">
                                    <cart-control :food="food" @drop="drop"></cart-control>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- 购物车 -->
        <shopcart ref="shopcartRef"
                  :selectFoods="selectFoods"
                  :deliveryPrice="seller.delivery_fee"
                  :minPrice="seller.min_price"></shopcart>

        <!-- 商品详情页 -->
        <goods-detail @drop="drop" :food="selectedFood" ref="goodsDetailRef"></goods-detail>

    </div>
</template>

<script>
    import Shopcart from '../../base/shopcart/shopcart.vue'
    import CartControl from '../../base/cart-control/cart-control.vue'
    import GoodsDetail from '../goods-detail/goods-detail.vue'
    import axios from 'axios'
    import BScroll from 'better-scroll'
    export default {
        components:{
            CartControl,
            Shopcart,
            GoodsDetail
        },

        props: {
            // 全部数据
            seller: {
                type: Object
            }
        },
        data(){
            return {
                goods:[],
                classMap: ['decrease', 'discount', 'special', 'invoice', 'guarantee'],
                // 右侧每一大项的高度区间
                // (10) [0, 1172, 1343, 1478, 1828, 2070, 2334, 2685, 3251, 4035]
                listHeight: [],
                // 计算当前滚动的 Y 值
                scrollY: 0,
                // 需要传入详情页的商品
                selectedFood: {}
            }
        },
        computed:{
            currentIndex(){
                for (let i = 0; i < this.listHeight.length; i++) {
                    let h1 = this.listHeight[i]
                    let h2 = this.listHeight[i + 1]

                    // 落到这个区间 或者 最后一个(无 h2)
                    if ((this.scrollY >= h1 && this.scrollY < h2) || !h2) {
                        return i
                    }
                }
                return 0
            },
            selectFoods(){
                let select=[];
                this.goods.forEach((good) => {
                    good.goods.forEach((food) => {
                        if (food.count) {
                            select.push(food)
                        }
                    })
                })
                return select
            }
        },
        methods:{
          _thisData:function () {
              axios.get('../store-goods/'+this.seller.store_id).then(res=>{
                  this.goods = res.data.data;
                  this.$nextTick(function () {
                      // 初始化 BScroll
                      this._initScroll();
                      // 计算右侧每一大项的高度
                      this._calcHeight()
                      this.menuScroll.refresh();
                      this.foodsScroll.refresh();
                  })

              })

          },
           _initScroll(){
              this.menuScroll = new BScroll(this.$refs.menuRef,{
                  click:true
              })
               this.foodsScroll = new BScroll(this.$refs.foodsRef,{
                   click:true,
                   probeType:3
               })
               this.foodsScroll.on('scroll', pos => {
                   this.scrollY = Math.abs(Math.floor(pos.y))
//                    console.log(this.scrollY)
               })
           },
            // 计算右侧每一大项的高度
            _calcHeight () {
                let foodList = this.$refs.foodsRef.getElementsByClassName('foods-list-hook')
                console.log(foodList.length);
                let height = 0
                this.listHeight.push(height)

                for (let i = 0; i < foodList.length; i++) {
                    height += foodList[i].clientHeight
                    this.listHeight.push(height)
                }
                // (10) [0, 1172, 1343, 1478, 1828, 2070, 2334, 2685, 3251, 4035]
//                 console.log(this.listHeight)
            },
            toFoodDetail:function(food,event){
                if(!event._constructed){
                    return;
                }
                this.selectedFood = food;
                this.$refs.goodsDetailRef.show()
            },
            selectMenu:function(index,event){
               if(!event._constructed){
                   return;
               }
                let foodList = this.$refs.foodsRef.getElementsByClassName('foods-list-hook')
                let el = foodList[index]
                this.foodsScroll.scrollToElement(el, 100)
            },
            drop (target) {
                // 性能优化，异步异步执行下落动画
                this.$nextTick(() => {
                    this.$refs.shopcartRef.drop(target)
                })
            }
        },
        watch:{
          'seller':function () {
              this._thisData();
          }
        },
        created(){},
        mounted(){}
    }
</script>
<style lang="scss">
    @import "../../../../sass/const.scss";
    @import "../../../../sass/mixin.scss";
    .goods {
        display: flex;
        position: absolute;
        top: 195px;
        bottom: 46px;
        width: 100%;
        background-color:#fff;
        overflow: hidden;
        .menu-wrapper {
            flex: 0 0 90px;
            width: 90px;
            background-color:#f3f5f7;
            .menu-item {
                display: table;
                text-align: center;
                width: 68px;
                height: 54px;
                line-height: 14px;
                padding:0 12px;
                @include onepx('bottom',true);
                &.current {
                    position: relative;
                    margin-top: -1px;
                    background-color: #fff;
                    font-weight: 700;
                    z-index: 10;
                }
                .text {
                    font-size: 12px;
                    display: table-cell;
                    vertical-align: middle;
                    .icon {
                        display: inline-block;
                        width: 12px;
                        height: 12px;
                        margin-right: 2px;
                        background-size: 12px 12px;
                        background-repeat: no-repeat;
                        vertical-align: top;
                        &.decrease {
                            @include bg-image('./img/decrease_3');
                        }
                        &.discount {
                            @include bg-image('./img/discount_3');
                        }
                        &.guarantee {
                            @include bg-image('./img/guarantee_3');
                        }
                        &.invoice {
                            @include bg-image('./img/invoice_3');
                        }
                        &.special {
                            @include bg-image('./img/special_3');
                        }
                    }
                }
            }
        }
        .foods-wrapper {
            flex: 1;
            .foods-list {
                .title {
                    padding-left: 14px;
                    height: 26px;
                    line-height: 26px;
                    border-left:2px solid #d9dde1;
                    font-size: 12px;
                    color: rgb(147,153,159);
                    background-color: #f3f5f7;
                }
                .foods-item {
                    position: relative;
                    display: flex;
                    margin: 18px;
                    padding-bottom: 18px;
                    @include onepx('bottom',true);
                    .icon {
                        flex:0 0 57px;
                        width: 57px;
                        height: 57px;
                        margin-right: 10px;
                        img {
                            width: 57px;
                            height: 57px;
                        }
                    }
                    .content {
                        flex:1;
                        .name {
                            font-size: 14px;
                            margin:2px 0 8px 0;
                            height: 14px;
                            line-height: 14px;
                            color: rgb(7,17,27);
                        }
                        .desc {
                            margin-bottom: 8px;
                            line-height: 14px;
                            font-size: 10px;
                            color: rgb(147,153,159);
                        }
                        .extra {
                            margin-bottom: 8px;
                            line-height: 12px;
                            font-size: 0;
                            color: rgb(147,158,159);
                            .count {
                                font-size: 10px;
                                margin-right: 12px;
                            }
                            .rating {
                                font-size: 10px;
                            }
                        }
                        .price {
                            font-weight:700;
                            line-height: 15px;
                            .now {
                                margin-right: 8px;
                                font-size: 14px;
                                color: rgb(240,20,20);
                            }
                            .old {
                                font-size:10px;
                                color: rgb(147,158,159);
                                text-decoration: line-through;
                            }
                        }
                        .control {
                            position: absolute;
                            right:0;
                            bottom: -25px;
                        }
                    }
                }
            }
        }
    }
</style>