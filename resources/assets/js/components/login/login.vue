<template>
    <div class="login">
        <header-bar text="注册/登录" :flag="true" @back="back"></header-bar>
        <!--<mt-navbar v-model="selected">-->
            <!--<mt-tab-item id="1">登录</mt-tab-item>-->
            <!--<mt-tab-item id="2">注册</mt-tab-item>-->
        <!--</mt-navbar>-->

        <mt-tab-container v-model="selected">
            <!-- 登录 -->
            <mt-tab-container-item id="1" class="login-wrapper">
                <mt-field label="手机号码" type="tel" maxlength="11" placeholder="请输入手机号码" v-model="user_name"></mt-field>

                <div style="position: relative;">
                    <mt-button type="primary"  class="captcha" :disabled="disabled"  @click="_captcha">{{captcha_txt}}</mt-button>
                    <mt-field placeholder="请输入验证码"  maxlength="4" type="tel" v-model="captcha" ></mt-field>
                </div>


                <mt-button class="tijiao" type="primary" size="large" @click.native="login">登录</mt-button>
            </mt-tab-container-item>
        </mt-tab-container>
    </div>
</template>
<script>
    import HeaderBar from '../header-bar/header-bar.vue'
    import axios from 'axios';
    import { Toast } from 'mint-ui'

    const TIME_COUNT = 60;
    export default {
        components:{
            HeaderBar
        },
        data(){
          return {
              selected:'1',
              user_name: '',
              captcha:'',
              disabled:false,
              captcha_txt:'获取验证码'
          }
        },
        methods:{
            back:function () {
                this.$router.push('/')
            },
            login:function(){
                if(this.user_name.length<11){
                    Toast('请输入正确的手机号码');
                    return;
                }
                if(this.captcha.length!==4){
                    Toast('请输入正确的验证码');
                    return;
                }

                axios.post('../login',{user_name:this.user_name,captcha:this.captcha}).then(res=>{
//                    console.log();
                    if(res.data.code == 0){
                        //保存下来
                        sessionStorage.setItem('token',JSON.stringify(res.data.data.user))
                        this.isLogin = 1;
//                        console.log(JSON.parse(sessionStorage.getItem('token')));
                        this.$router.push({
                            path:'/mine'
                        })
                    }else{
                        Toast(res.data.err);
                    }
                }).catch(err=>{
                    console.log(err);
                })
            },
            _captcha:function () {
                if(this.user_name.length<11){
                    Toast('请输入正确的手机号码');
                    return;
                }
                axios.post('../get_captcha',{user_name:this.user_name}).then(res=>{
                    if(res.data.code == 0){

                        this.disabled=true;
                        this.captcha_txt=60;
                        var timer=setInterval(()=>{
                            if(this.captcha_txt>0 && this.captcha_txt<=TIME_COUNT){
                                this.captcha_txt--;
                            }else{
                                clearInterval(timer);
                                this.disabled=false;
                                this.captcha_txt='获取验证码'

                            }

                        },1000)
                    }
                }).catch(err=>{
                    console.log(err);
                })



            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../sass/const.scss';
    @import '../../../sass/mixin.scss';

    .login {
        color: #333;
        margin-top: 24px;
        background-color: #fff;
        overflow: visible;
        .login-wrapper {
            margin-top: 20px;
            overflow: hidden;
            .tijiao {
                margin-top: 20px;
            }
            .captcha{
                position: absolute;
                right: 0;
                top: 0;
                width: 120px;
                height:100%;
                z-index: 100;

            }
        }
        .register-wrapper {
            margin-top: 20px;
            overflow: hidden;
            .mint-button {
                margin-top: 30px;
            }
        }
    }
</style>