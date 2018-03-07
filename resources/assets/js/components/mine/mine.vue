<template>
    <div class="mine" v-cloak>
        <!-- 顶部头像和设置 -->
        <div class="top">
            <div class="info">
                <div class="avatar-wrapper">
                    <img :src="user.avatar">
                </div>

                <div class="name-wrapper" v-if="login_state" @click="login">
                    <span class="name">登录</span>
                    <!--<span class="desc">个人信息 <i class="iconfont icon-more"></i></span>-->
                </div>
                <div class="name-wrapper" v-if="user_state">
                    <span class="name">{{user.user_name}}</span>
                </div>
            </div>

            <div class="operation">
                <i class="iconfont icon-huanfu"></i>
                <i class="iconfont icon-youjian"></i>
                <i class="iconfont icon-shezhi"></i>
            </div>
        </div>

        <!-- 横线分隔条 -->
        <cross-line></cross-line>

        <!-- 重要的栏目 -->
        <div class="important">
            <cross-item name="我的收藏">
                <i class="iconfont icon-shoucang1"></i>
            </cross-item>

            <cross-item name="我的足迹">
                <i class="iconfont icon-zuji"></i>
            </cross-item>

            <cross-item name="收货地址">
                <i class="iconfont icon-dizhi"></i>
            </cross-item>

            <cross-item name="余额">
                <i class="iconfont icon-money"></i>
            </cross-item>

        </div>

        <!-- 横线分隔条 -->
        <cross-line></cross-line>

        <!-- 次要的栏目 -->
        <div class="minor">
            <cross-item name="关于">
                <i class="iconfont icon-daohangguanyu"></i>
            </cross-item>
            <div @click="logout">
                <cross-item name="注销">
                    <i class="iconfont icon-zuji"></i>
                </cross-item>
            </div>
        </div>
        <tab-bar></tab-bar>
    </div>
</template>
<script>
    import TabBar from '../tab-bar/tab-bar.vue'
    import CrossLine from '../base/cross-line/cross-line.vue'
    import CrossItem from '../base/cross-item/cross-item.vue'
//    import HeaderBar from '../header-bar/header-bar.vue'
    import {isLogin} from '../basejs/common'
    import axios from 'axios';
    import { MessageBox } from 'mint-ui'
    export default {
        data(){
          return{
              login_state:true,
              user:{
                  'avatar':'../images/avatar@3x.png'
              },
              user_state:false,

            }
        },
        methods:{
            logout:function () {
                MessageBox.confirm('',{
                    message:`您确定要退出登录吗？`,
                    title:'提示',
                    confirmButtonText:'确定',
                    cancelButtonText:'取消',

                }).then(action=>{
                    if(action == 'confirm'){
                        axios.get('../logout').then(res=>{
                            if(res.data.code==0){
                                sessionStorage.removeItem('token');
                                this.$router.push({
                                    path:'/'
                                })
                            }
                        }).catch(err=>{
                            console.log(err);
                        })
                    }
                }).catch(err=>{
                    //console.log(err)
                    //取消不做操作
                })

            },
          login(){
              this.$router.push({
                  path:'/login'
              })
          }
        },
        created:function () {
            var _this=this;
            isLogin(function(make){
                if(make){
                    _this.login_state=false;
                    _this.user_state = true;
                    _this.user =JSON.parse(sessionStorage.getItem('token'));
                    if(!_this.user.avatar){
                        _this.user.avatar="../images/avatar@3x.png";
                    }
                }
            });
        },
        deactivated() {
            this.$destroy(true);
        },
        mounted:function () {



        },
        components:{
            TabBar,
            CrossLine,
            CrossItem,
            //HeaderBar,
        }
    }
</script>

<style lang="scss">
    @import '../../../sass/const.scss';
    @import '../../../sass/mixin.scss';
    .mine {
        width: 100%;
        height: 100%;
        /*background-color: #ebebeb;*/
        .top {
            display: flex;
            position: relative;
            width: 100%;
            height: 120px;
            background-color: rgba(7,17,27,0.4);
            .info {
                flex: 2;
                display: flex;
                flex-direction: row;
                margin-top: 40px;
                .avatar-wrapper {
                    width: 70px;
                    height: 70px;
                    margin-left: 20px;
                    img {
                        width: 70px;
                        height: 70px;
                        border-radius: 50%;
                    }
                }
                .name-wrapper {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    height: 55px;
                    margin-top: 10px;
                    margin-left: 20px;
                    .name {
                        font-size: 16px;
                        color: #fff;
                        font-weight: bold;
                    }
                    .desc {
                        font-size: 16px;
                        color: #fcfefe;
                        i {
                            font-size: 18px;
                        }
                    }
                }
            }
            .operation {
                flex: 1;
                display: flex;
                flex-direction: row;
                justify-content: flex-end;
                i {
                    margin-top: 10px;
                    margin-right: 15px;
                    color: #fff;
                    font-size: 18px;
                    font-weight: 500;
                }
            }
        }
        .important {
            width: 100%;
            background-color: #fff;
            .cross-item {
                &:last-child {
                    border-bottom: none;
                }
            }
        }
        .minor {
            width: 100%;
            background-color: #fff;
            .cross-item {
                &:last-child {
                    border-bottom: none;
                }
            }
        }
    }
</style>