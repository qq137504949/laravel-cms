<template>
    <div class="star" :class="starType">
        <span class="star-item" v-for="item in itemClasses" :class="item"></span>
    </div>
</template>
<script>
    const LENGTH = 5;
    const CLSON = 'on';
    const CLSHALF = 'half';
    const CLSOFF = 'off'
    export default {
        components:{},
        data(){
            return{

            }
        },
        props:{
            size:{
                type:Number,
                default:48
            },
            score:{
                type:Number,
                default:0
            },
        },
        computed:{
            starType(){
                return 'star-'+this.size;
            },
            //动态添加'on' half off
            itemClasses(){
                let result = [];
                let score = Math.floor(this.score);
                let hasDecimal = score % 1 !== 0;
                let integer = Math.floor(score)
                // 整星
                for (let i = 0; i < integer; i++) {
                    result.push(CLSON)
                }
                // 半星
                if (hasDecimal) {
                    result.push(CLSHAlF)
                }
                // 补齐
                while (result.length < LENGTH) {
                    result.push(CLSOFF)
                }
                return result;
            }
        }
    }
</script>
<style lang="scss">
    @import "../../../../sass/const.scss";
    @import "../../../../sass/mixin.scss";

    .star {
        .star-item {
            display: inline-block;
            background-repeat:no-repeat;
        }
        &.star-48 {
            .star-item {
                width: 20px;
                height: 20px;
                -webkit-background-size: 20px 20px;
                background-size: 20px 20px;
                margin-right: 22px;
                &:last-child {
                    margin-right: 0;
                }
                &.on {
                    @include bg-image('img/star48_on')
                }
                &.half {
                    @include bg-image('img/star48_half')
                }
                &.off {
                    @include bg-image('img/star48_off')
                }
            }
        }
        &.star-36 {
            .star-item {
                width: 15px;
                height: 15px;
                margin-right: 6px;
                background-size: 15px 15px;
                &:last-child {
                    margin-right: 0;
                }
                &.on {
                    @include bg-image('img/star36_on');
                }
                &.half {
                    @include bg-image('img/star36_half');
                }
                &.off {
                    @include bg-image('img/star36_off');
                }
            }
        }
        &.star-24 {
            .star-item {
                width: 10px;
                height: 10px;
                margin-right: 3px;
                background-size: 10px 10px;
                &:last-child {
                    margin-right: 0;
                }
                &.on {
                    @include bg-image('img/star24_on');
                }
                &.half {
                    @include bg-image('img/star24_half');
                }
                &.off {
                    @include bg-image('img/star24_off');
                }
            }
        }
    }
</style>