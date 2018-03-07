<template>
    <div class="jiesuan">
        <header-bar @back="back" :text="title" :flag="true"></header-bar>
        <div class="wrapper">
            <div class="address" @click="ads_list" v-if="is_address">
                <div class="text">
                    <span class="title" >请选择收货地址</span>
                </div>
                <div class="right">
                    <i class="icon-keyboard_arrow_right"></i>
                </div>
            </div>
            <div class="address" v-if="address.address_id">
                <div class="text">
                    <div class="content" >
                        <div class="user">
                            <h5 class="name">{{address.true_name}}</h5>
                            <div class="phone">手机：<span>{{address.mobile}}</span></div>
                        </div>

                        <div class="ads">{{address.address}}</div>
                    </div>
                </div>
                <div class="right" @click="ads_list">
                    <i class="icon-keyboard_arrow_right"></i>
                </div>
            </div>
            <cross-line></cross-line>
            <div class="content">
                <div class="title-bar">
                    <span>{{store.store_name}}</span>
                </div>

                <div class="goods" v-for="item in cart">
                    <div class="name">{{item.goods_name}}</div>
                    <div class="goods_num">×{{item.count}}</div>
                    <div class="price">¥{{item.price}}</div>
                </div>
                <cross-line></cross-line>
                <div class="goods">
                    <div class="name">配送费</div>
                    <div class="goods_num"></div>
                    <div class="price">¥{{store.delivery_fee}}</div>
                </div>
                <div class="you_hui">
                    <div class="heji">
                        小计: <span class="zong">¥{{totalPrice}}</span>
                    </div>
                </div>

            </div>

            <div class="foods-wrapper">
                <div class="content">
                    <div class="left">
                        合计: <span>{{totalPrice}}</span>元
                    </div>
                    <div class="right" @click="add_order">
                        <div class="pay">
                            确认下单
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import headerBar from '../../header-bar/header-bar.vue'
    import CrossLine from '../../base/cross-line/cross-line.vue'
    import axios from 'axios'
    import { Toast } from 'mint-ui';
export default {
    data(){
        return{
            title:'订单确认',
            cart:[],
            store_id:this.$route.query.id,
            store:{},
            address:{},
            is_address:true
        }
    },
    methods:{
        back:function(){
            this.$router.push({
                path:'/'
            })
        },
        _initData:function(){
            axios.get('../store-detail/'+this.store_id).then(res=>{
                var data = res.data;
                if(data.code == '0'){
                    this.store = data.data;
                }
            }).catch(err=>{
                console.log(err)
            })

            axios.get('../get-moren').then(res=>{
                if(res.data.code == 0){
                    this.address = res.data.data;
                    this.is_address = false;
                }

            }).catch(err=>{
                console.log(err);
            })
        },
        ads_list:function () {
            this.$router.push({
                path:'/address',
                query:{
                    id:this.$route.query.id
                }
            })
        },
        add_order:function () {
            if(!this.address){
                Toast('请选择收件人信息');
                return;
            }

            axios.post('../add-order',{cart:this.cart,store_id:this.store_id,address:this.address}).then(res=>{
                console.log(res.data)
            }).catch(err=>{
                console.log(err);
            })
        }
    },
    created:function () {
        this.cart = JSON.parse(sessionStorage.getItem('cart'));
        console.log(this.cart);
    },
    mounted:function () {
        this._initData();
    },
    deactivated() {
        this.$destroy(true);
    },
    computed:{
        totalPrice() {
            let total = 0
            this.cart.forEach((food) => {
                total += food.price * food.count
            })
            return this.store.delivery_fee*1+total*1;
        }
    },
    components:{
        headerBar,
        CrossLine
    }
}
</script>
<style lang="scss">
    @import '../../../../sass/const.scss';
    @import '../../../../sass/mixin.scss';
.jiesuan{
   .wrapper{
       margin-top: 42px;
       .address {
           height: 44px;
           line-height: 44px;
           display: flex;
           background-color: #fff;
           .text{
               width:100%;
               padding-left: 15px;
               .content{
                   width: 100%;
                   position: relative;

                   .user{
                       display: flex;
                       font-size: 0;
                       height: 22px;
                       line-height: 22px;
                       .name{
                           flex:0 0 80px;
                           padding: 5px 0 0 5px;
                           font-size:14px;
                       }
                       .phone {
                           flex:1;
                           padding: 5px 0 0 5px;
                           font-size: 12px;
                       }
                   }
                   .ads{
                       position: absolute;
                       top: 22px;
                       left:0;
                       height:22px;
                       line-height:22px;
                       font-size: 12px;
                       color: #4d555d;
                   }
               }

               /*.title{*/
                   /*border:1px solid #0f0f0f;*/
                   /*border-radius: 30px;*/
                   /*padding:5px;*/
               /*}*/
           }
           .right {
               flex:0 0 30px;
               i {
                   font-size:14px;
               }
           }
       }
       .content {
           background: #fff;
           width: 100%;
           height: 100%;
           .title-bar {
               height: 40px;
               line-height: 40px;
               text-align: center;
               span {
                   display: inline-block;
                   position: relative;
                   font-weight:bold;
                   color: #333;
                   &:before{
                       content: '';
                       position: absolute;
                       top: 20px;
                       left: -45px;
                       width: 30px;
                       border-top:1px solid #333;
                       -webkit-transform: scaleY(0.5);
                       -moz-transform: scaleY(0.5);
                       -ms-transform: scaleY(0.5);
                       -o-transform: scaleY(0.5);
                       transform: scaleY(0.5);
                   }
                   &:after{
                       content:'';
                       position: absolute;
                       top: 20px;
                       right: -43px;
                       width:30px;
                       border-top: 1px solid #333;
                       -webkit-transform: scaleY(0.5);
                       -moz-transform: scaleY(0.5);
                       -ms-transform: scaleY(0.5);
                       -o-transform: scaleY(0.5);
                       transform: scaleY(0.5);
                   }
               }
           }
           .goods{
               display: flex;
               position: relative;
               top: 0;
               left: 0;
               @include onepx('bottom',true);
               .name{
                   width:45%;
                   padding:5px 10px;
                   line-height:20px;
                   overflow: hidden;
                   white-space:nowrap;
                   text-overflow: ellipsis;
                   color:#4d555d;
                   font-size:13px;
               }
               .goods_num,.price{
                   flex:1;
                   padding:5px 10px;
                   line-height:20px;
                   font-size:12px;
               }
               .goods_num,.price{
                   text-align: right;
               }
           }
           .you_hui{
               position: relative;
               background-color: #fff;
               height: 42px;
               .heji{
                   position: absolute;
                   right: 10px;
                   font-size: 12px;
                   vertical-align: top;
                   padding-top:10px;
                   .zong{
                       font-size: 16px;
                       color: red;
                   }
               }
           }
       }
       .foods-wrapper{
           .content{
               position: fixed;
               left: 0;
               bottom: 0;
               width: 100%;
               height: 48px;
               z-index: 50;
               background-color:#141d27;
               .left{
                   position: absolute;
                   left: 0;
                   top: 0;
                   height:48px;
                   line-height:48px;
                   padding-left:10px;
                   color:#fff;
                   font-size: 16px;
                   span{
                       font-size:18px;
                       font-weight:700;
                   }
               }
               .right{
                   position: absolute;
                   right:0;
                   top:0;
                   .pay{
                       height:48px;
                       line-height:48px;
                       padding:0 10px 0 10px;
                       background-color: #00a0dc;
                       color:#fff;
                       text-align: center;
                   }
               }
           }
       }
   }
}
</style>
