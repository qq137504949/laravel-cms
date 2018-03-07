<!--商家详情-->
<template>
    <div class="restaurant-detail">
       <seller-header :store="store"></seller-header>
        <div class="tab">
            <div class="tab-item">
                <router-link to="./goods">商品</router-link>
            </div>
            <div class="tab-item">
                <router-link to="./ratings">评价</router-link>
            </div>
            <div class="tab-item">
                <router-link to="./seller">商家</router-link>
            </div>
        </div>
        <keep-alive>
        <router-view :seller="store"></router-view>
        </keep-alive>
    </div>
</template>
<script>
    import SellerHeader from  '../../base/seller-header/seller-header.vue'
    import axios from 'axios'
export default {
    components:{
        SellerHeader
    },
    data(){
        return{
            title:'店铺详情',
            store_id:this.$route.query.id || '1',
            store:{}
        }
    },
    mounted(){
        this._initData();
    },
    deactivated(){
      this.$destroy(true);
    },
    methods:{
        _initData(){
            axios.get('../store-detail/'+this.store_id).then(res=>{
                var data = res.data;
                if(data.code == '0'){
                    this.store = data.data;
                }
            },err=>{
                console.log(err)
            })
        }
    }
}
</script>
<style lang="scss">
    @import "../../../../sass/const";
    @import "../../../../sass/mixin";
.restaurant-detail {
 .tab {
     display: flex;
     flex-direction:row;
     width:100%;
     height: 40px;
     line-height: 40px;
     text-align: center;
     @include onepx('bottom');
     .tab-item {
         flex: 1;
         background-color: #fff;
         a {
             display: block;
             font-size: 14px;
             color: rgb(77,85,93);
             &.router-link-active {
                 color: rgb(240,20,20);
             }
         }
     }
 }
}
</style>