<template>
    <div class="index">
        <header-bar :text="title"></header-bar>
        <!-- 轮播图 -->
        <banner :listImg="listImg" class="banner"></banner>
        <!--导航-->
        <div class="types">
            <div class="types-item">
                <img src="./img/types/types_1.png" alt="">
                <span>生鲜</span>
            </div>
            <div class="types-item">
                <img src="./img/types/types_7.png" alt="">
                <span>美食</span>
            </div>
            <div class="types-item">
                <img src="./img/types/types_2.png" alt="">
                <span>农耕</span>
            </div>
            <div class="types-item">
                <img src="./img/types/types_4.png" alt="">
                <span>匠心</span>
            </div>
        </div>
        <div class="content">
            <div class="column">
                <div class="item">
                    <img src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=881638803,1075513620&fm=27&gp=0.jpg" alt="">
                </div>
                <div class="item">
                    <img src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=881638803,1075513620&fm=27&gp=0.jpg" alt="">
                </div>
            </div>
            <div class="column">
                <div class="item">
                    <img src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=881638803,1075513620&fm=27&gp=0.jpg" alt="">
                </div>
                <div class="item">
                    <img src="https://ss3.bdstatic.com/70cFv8Sh_Q1YnxGkpoWK1HF6hhy/it/u=881638803,1075513620&fm=27&gp=0.jpg" alt="">
                </div>
            </div>
        </div>
        <!--附近商家-->
        <div class="nearby">
            <div class="title-bar">
                <span>特色商家</span>
            </div>
            <div class="store-list" @click="toRestaurant(data.store_id)" v-for="data in indexList">
                <div class="left">
                    <img v-lazy="data.logo" alt="">
                </div>
                <div class="right">
                    <div class="name">{{data.store_name}}</div>
                    <div class="mid clearfix">
                        <star :size="24" :score="data.store_score"></star>
                        <span class="time">20分钟</span>
                        <span class="count">月销: {{ data.month_sale_num }}</span>
                        <span class="distance"> <!-- 定位位置  --></span>
                    </div>
                    <div class="fee">
                        <span class="start">起送¥{{ data.min_price }}</span>
                        <span class="deliver">配送¥{{ data.delivery_fee }}</span>
                        <span class="average">人均¥{{ data.average_price }}</span>
                    </div>
                </div>
            </div>
        </div>
        <!--底部导航-->
        <tab-bar></tab-bar>
    </div>
</template>
<script>
    import TabBar from '../tab-bar/tab-bar.vue'
    import HeaderBar from '../header-bar/header-bar.vue'
    import Banner from  '../base/banner/banner.vue'
    import Star from '../base/star/star.vue'
    import axios from 'axios'
export default {
        data(){
            return {
                title:"农夫市集",
                listImg:[
                    {
                        url:'http://img5.imgtn.bdimg.com/it/u=811961141,2620302096&fm=27&gp=0.jpg'
                    },{
                        url:'https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=2163379055,78645576&fm=27&gp=0.jpg'
                    }
                ],

                indexList:[],
            }
        },
    methods:{
        _initIndexListData(){
            axios.get('../index-page').then(res=>{
                if(res.data.code == 0){
                    console.log(res.data);
                    this.indexList = res.data.data;
//                    console.log(this.indexList);
                }
            }).catch(err=>{
                console.log(err);
            })
        },
        toRestaurant(store_id){
            this.$router.push({
                path:'/restaurant',
                query:{
                    id:store_id
                }
            })
        }
    },
    created(){
      this._initIndexListData();

    },
    components:{
        TabBar,
        HeaderBar,
        Banner,
        Star
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/const.scss';
@import '../../../sass/mixin.scss';

    .index {
        .banner {
            margin-top:42px;
        }
        .content {
            width:100%;
            font-size:0;
            background: #fff;
            display: flex;
            justify-content:center;
            align-items: center;
            flex-wrap: wrap;
            align-content:space-between;
            .column{
                flex-basis: 98%;
                display: flex;
                justify-content:space-between;
                .item{
                    padding: 2px;
                    width:100%;
                    img{
                        width:100%;
                        border: 0;
                    }
                }

            }
        }
        .types {
            /*display:flex;*/
            width:100%;
            padding-bottom: 10px;
            background-color: #fff;
            overflow: hidden;
            .types-item {
                float:left;
                width:25%;
                padding-top:15px;
                img {
                    display: block;
                    width: 60px;
                    margin:0 auto 12px;
                }
                span {
                    display: block;
                    font-size: 14px;
                    text-align: center;
                    line-height: 14px;
                    color: #2f2f2f;
                }
            }
        }

        .nearby {
            background: #fff;
            margin-bottom: 50px;
            .title-bar {
                height: 40px;
                line-height: 40px;
                text-align: center;
                span {
                    display: inline-block;
                    position: relative;
                    font-weight:bold;
                    color: #333;
                    &:before {
                        content: '';
                        position: absolute;
                        top: 20px;
                        left: -45px;
                        width: 30px;
                        border-top:1px solid #333;
                        transform:scaleY(0.5);
                    }
                    &:after {
                        content: '';
                        position: absolute;
                        top: 20px;
                        right: -43px;
                        width: 30px;
                        border-top:1px solid #333;
                        transform:scaleY(0.5);
                    }
                }
            }
            .store-list {
                display: flex;
                flex-direction:row;
                margin-bottom: 5px;
                padding:10px 0;
                overflow: hidden;
                @include onepx('bottom');
                &:last-child {
                    &:after {
                        border-top: 0;
                    }
                }
                .left {
                    flex: 0 0 90px;
                    width: 90px;
                    img {
                        display: block;
                        width: 70px;
                        margin:0 auto;
                        border:0;
                    }
                }
                .right {
                    flex: 1;
                    display: flex;
                    flex-direction:column;
                    padding-right: 10px;
                    overflow: hidden;
                    .name {
                        font-size: 17px;
                        color: #333;
                        overflow: hidden;
                        font-weight: bold;
                        margin-right: 15px;
                        overflow: hidden;
                        @include ellipsis(1);
                    }
                    .mid {
                        flex:1;
                        font-size: 12px;
                        color: #666;
                        margin-top: 7px;
                        display: flex;
                        .star { flex:1;}
                        .count {
                            margin-left: 10px;
                            display: inline-block;
                        }
                        .distance {
                            flex:1;
                            margin-left: 5px;
                            margin-top: 2px;
                            text-align: right;
                        }
                        .time {
                            display: inline-block;
                            @include right-bar();
                        }

                    }
                    .fee {
                        flex: 1;
                        font-size: 12px;
                        margin-top: 7px;
                        span {
                            display: inline-block;
                            color: #656565;
                        }
                        .start {
                            @include right-bar();
                        }
                        .deliver {
                            @include right-bar();
                        }
                        .average {
                            color: red;
                        }
                    }

                }
            }
        }

    }
</style>