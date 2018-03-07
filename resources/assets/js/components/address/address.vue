<template>
    <div class="address_wrapper">
        <header-bar @back="back" :text="title" :flag="true"></header-bar>


        <div class="wrapper" v-if="is_address">
            <div class="content"  v-for="item in addresList">
                <div class="left" @click="moren(item.address_id,item.is_default)">
                    <i class="icon-check_circle" v-if="item.is_default"></i>
                </div>
                <div class="middle" @click="moren(item.address_id,item.is_default)">
                    <div class="info">{{item.true_name}} <span class="phone">{{item.mobile}}</span></div>
                    <div class="address">{{item.address}}</div>
                </div>
                <div class="right" @click="updateAddress(item)"><i class="icon-keyboard_arrow_right"></i></div>
            </div>

            <mt-button class="tijiao" type="primary" size="large" @click.native="addAddress">添加收货地址</mt-button>
        </div>

        <transition name="shift">
        <div class="add-address" v-if="show_add">
            <mt-tab-container>
                <mt-tab-container-item class="wrapper">
                    <mt-field label="姓名" v-model="name" placeholder="收件姓名"></mt-field>
                    <mt-field maxLength="11" v-model="phone" label="手机" placeholder="收件人手机"></mt-field>
                    <mt-field label="地址" v-model="address" placeholder="收件地址"></mt-field>

                    <mt-button class="tijiao" type="primary" size="large" @click.native="saveAddress">保存</mt-button>
                </mt-tab-container-item>
            </mt-tab-container>
        </div>
        </transition>
    </div>
</template>

<script>
    import headerBar from '../header-bar/header-bar.vue'
    import { Toast } from 'mint-ui';
    import axios from 'axios'
//    import {isLogin} from '../../basejs/common'
    export default {
        data(){
          return{
              title:'收件地址',
              show_add:false,
              is_address:true,
              name:'',
              phone:'',
              address:'',
              address_id:0,
              user:JSON.parse(sessionStorage.getItem('token')),
              addresList:[]
          }
        },
        mounted(){
            this._addressList();

        },
        methods:{
            back:function(){
                this.$router.push({
                    path:'/jiesuan',
                    query:{
                        id:this.$route.query.id
                    }
                })
            },
            _addressList:function () {
//                console.log(this.user.user_id)
                var _this = this;

                axios.get('../address?member_id='+this.user.user_id).then(res=>{
                    _this.addresList = res.data;

                }).catch(err=>{
                    console.log(err);
                })
            },
            addAddress:function () {
                this.show_add = true;
                this.is_address = false;
            },
            updateAddress:function(obj){
               this.address_id = obj.address_id;
               this.name = obj.true_name;
               this.phone = obj.mobile;
               this.address = obj.address;
                this.addAddress();
            },
            moren:function (address_id,is_default) {
                if(is_default){
                    Toast('已经是默认地址');
                    return ;
                }
                var _this = this;
              axios.get('../set-moren/'+address_id).then(res=>{
                 if(res.data.code == 0){

                     Toast(res.data.data);
                     _this._addressList();
                 }
              }).catch(err=>{
                  console.log(err);
              })
            },
            saveAddress:function(){
                if(!this.name){
                    Toast('请输入姓名');
                    return;
                }
                if(this.phone.length!=11){
                    Toast('请输入正确的手机号码');
                    return;
                }
                if(!this.address){
                    Toast('请输入地址');
                    return
                }
                var _this = this;
                if(this.address_id){
                    axios.post('../update-address/'+this.address_id,{true_name:this.name,mobile:this.phone,address:this.address,member_id:this.user.user_id}).then(res=>{
                        if(res.data.code == 0){
                            Toast('更新成功');
                            _this._addressList();
                            setTimeout(function(){
                                _this.show_add = false;
                                _this.is_address = true;
                            },500)
                        }
                    }).catch(err=>{
                        console.log(err);
                    })
                }else{
                    axios.post('../add-address',{true_name:this.name,mobile:this.phone,address:this.address,member_id:this.user.user_id}).then(res=>{
                        if(res.data.code == 0){
                            Toast('添加成功');
                            _this._addressList();
                            setTimeout(function(){
                                _this.show_add = false;
                                _this.is_address = true;
                            },500)
                        }
                    }).catch(err=>{
                        console.log(err);
                    })
                }


            }
        },
        deactivated() {
            this.$destroy(true);
        },
        components:{
            headerBar
        }
    }
</script>
<style lang="scss">

    .address_wrapper {
        .wrapper{
            margin-top: 42px;
            overflow: hidden;
            background-color: #fff;

            .content{
                display: flex;
                justify-content:center;
                width: 100%;
                height: 50px;
                font-size:0;
                .left{
                    flex:0 0 48px;
                    font-size: 12px;
                    vertical-align: top;
                    padding-top:10px;
                    text-align: center;
                    i{
                        font-size: 22px;
                        color:#5ED14F;
                    }
                }
                .middle{
                    flex:1;
                    font-size:12px;
                    vertical-align: top;
                    .info{
                        font-size: 14px;
                        font-weight:700;
                        padding-top: 8px;
                        .phone{
                            font-size: 12px;
                            margin-left:5px;
                            font-weight:normal;
                            color:#4d555d;
                        }
                    }
                    .address{
                        font-size: 12px;
                        color: #4d555d;
                    }
                }
                .right{
                    flex:0 0 40px;
                    font-size: 22px;
                    vertical-align: top;
                    text-align:center;
                    padding-top: 15px;
                    color: #4d555d;
                }
            }

        }
        .tijiao{
            position: fixed;
            left:0;
            bottom: 0;
        }
    }
    .add-address{

    }
</style>