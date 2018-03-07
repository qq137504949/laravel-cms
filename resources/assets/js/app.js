// require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router';
import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import VueLazyload from 'vue-lazyload'
import '../sass/reset.scss';
import '../sass/iconfont.scss';
// import '../ali-fonts/iconfont.css'

// Mint UI
import Mint from 'mint-ui'
import 'mint-ui/lib/style.css'
Vue.use(Mint)

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueLazyload,{
   loading:'../images/loading-bars.svg'
});
Vue.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};
Vue.axios.defaults.baseURL = Laravel.apiUrl;

import App from './components/App.vue';

import Index from './components/index/index.vue';
import Order from './components/order/order.vue';
import Mine from './components/mine/mine.vue';
import RestaurantDetail from './components/index/restaurant-detail/restaurant-detail.vue';
import Goods from './components/index/goods/goods.vue'
import Ratings from './components/index/ratings/ratings.vue'
import Seller from './components/index/seller/seller.vue'
import Jiesuan from './components/index/jiesuan/jiesuan.vue'
import Login from './components/login/login.vue'
import Address from './components/address/address.vue'
const router =  new VueRouter({
    routes:[
        {
            path:'/',
            redirect:'/index',
            component:Index
        },
        {
            path:'/index',
            component:Index
        },
        {
            path:'/login',
            component:Login
        },
        {
            path:'/order',
            component:Order
        },
        {
            path:'/mine',
            component:Mine
        },
        //下单
        {
          path:'/jiesuan',
          component:Jiesuan
        },
        {
          path:'/address',
          component:Address
        },
        //商家模块
        {
            path:'/restaurant',
            redirect:'/restaurant/goods',
            component:RestaurantDetail,
            children:[
                {
                    path:'goods',
                    component:Goods
                },
                {
                    path:'ratings',
                    component:Ratings
                },
                {
                    path:'seller',
                    component:Seller
                }

            ]
        }
    ]
})


const app = new Vue({
    el: '#app',
    router,
    template:'<App/>',
    components:{App}
});
