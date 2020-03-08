<template>
    <div class="col-xs col-sm col- col-md col-lg col-xl-12 pay-Successful">
        <center>
            <div v-if="loading === 1" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>

            <div v-if="ok === 1" class="col-xs col-sm col- col-md col-lg col-xl-10 pay-Successful-inside">
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
    </div>
</template>

<script>
    export default {
        name: "pay-success" ,
        props: ['pay_id'] ,

        data() {
            return {
                order: [] ,
                code: '' ,
                loading: '' ,
                ok: 0 ,
            }
        } ,
        created() {
            this.get_order();
        } ,

        methods: {
            sendMessage(code) {
                axios({
                    url: '/api/sendMessage' ,
                    method: 'post' ,
                    data: {
                        code: code,
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            get_order() {
                this.order = JSON.parse(localStorage.getItem('toPay'));
                this.create_orders();
            } ,
            create_orders() {
                this.loading = 1;
                axios({
                    url: '/api/order/create' ,
                    method: 'post' ,
                    data: {
                        total: this.order.total ,
                        products: this.order.products ,
                        factor: this.order.factor ,
                        payment_method: this.order.payment_method ,
                        pay_id: this.pay_id ,
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.code = res.data.code;
                        this.loading = 0;
                        this.ok = 1;
                        localStorage.removeItem('toPay');
                        localStorage.removeItem('order');
                        //this.sendMessage(this.code);
                    })
                    .catch(err => {
                        this.loading = 0;
                        console.log(err.response);
                    })
            } ,
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
        background: #ff7a76;
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