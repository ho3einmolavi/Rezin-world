<template>
    <div class="col-xs col-sm col- col-md col-lg col-xl-12 pay-Successful">
        <center >
            <div class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside">
                <div class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside-img">
                    <img src="/img/pay/success.png">
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside-text-top">
                    <span>   سفارش شما با موفقیت ثبت شد :)  </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside-text-end">
                    <span class="text-black">  شماره پیگیری  سفارش  :  <span>{{code}} </span>  </span>
                </div>
            </div>
        </center>
        <!--<center v-if="loading === 1">-->
            <!--<div class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside">-->
                <!--<div class="col-xs col-sm col- col-md col-lg col-xl-10 text-gray">-->
                    <!--<span >  لطفا منتظر بمانید  </span>-->
                <!--</div>-->
                <!--<div class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside-img">-->
                    <!--<div class="lds-ellipsis" ><div></div><div></div><div></div><div></div></div>-->
                <!--</div>-->

            <!--</div>-->

        <!--</center>-->
    </div>
</template>

<script>
    export default {
        name: "pay-success" ,


        data() {
            return {
                code: ''
            }
        } ,
        created() {
            this.get_code();
        } ,

        methods: {
            get_code() {
                this.code = localStorage.getItem('tracking_code')
            }
        }
    }
</script>

<style scoped>
    .lds-ellipsis {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ellipsis div {
        position: absolute;
        top: 33px;
        width: 13px;
        height: 13px;
        border-radius: 50%;
        background: #1b73f4;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
        left: 8px;
        animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
        left: 8px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
        left: 32px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
        left: 56px;
        animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(24px, 0);
        }
    }

</style>