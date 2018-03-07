import axios from 'axios';
export function isLogin(fn) {
    axios.get('../check-login').then(res=>{
        var isLogin=null;
        var user = JSON.parse(sessionStorage.getItem('token'))
        if(res.data.auth == 'Authenticated'&&user){
            isLogin= true;
        }else{
            isLogin= false;
        }
        fn&&fn(isLogin);
    }).catch(err=>{
        console.log(err);
    })

}