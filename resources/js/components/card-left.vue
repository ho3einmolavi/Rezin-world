<template>
    <div class="col-xs col-sm col- col-md-3 col-lg-3 col-xl-3  buy-card-left">
        <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-top delete-padding">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-top-filter">
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-filter-main flex delete-padding">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 buy-card-left-top-filter-main-inside-right">
                        <span class="title-4 text-black"> مبلغ کل  <span class="title-4 text-black"> ({{orders.length}} کالا) </span> </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 buy-card-left-top-filter-main-inside-left">
                        <span class="title-4 text-black"> {{cost(orders).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان</span>
                    </div>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-filter-main flex delete-padding">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 buy-card-left-top-filter-main-inside-right">
                        <span class="title-4" style="color: #3bb4d5;">تخفیف </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 buy-card-left-top-filter-main-inside-left">
                        <span class="title-4" style="color: #3bb4d5;">  2/000 تومان</span>
                    </div>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-filter-main flex delete-padding">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 buy-card-left-top-filter-main-inside-right">
                        <span class="title-4 text-black"> هزینه ارسال  </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 buy-card-left-top-filter-main-inside-left">
                        <span class="title-4 text-black"> رایگان  </span>
                    </div>
                </div>
            </div>
            <hr class="hr-price">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-top-price delete-padding">
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-price-1">
                    <span class="text-black">  مبلغ قابل پرداخت  : </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-price-2">
                    <span class="text-black"> {{cost(orders).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان  </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-price-3">
                    <div style="cursor: pointer" @click="where_to_go"><div class="col-xs col-sm col- col-md-12 col-lg col-xl-12 pay-price">
                        <span><i class="fas fa-arrow-left"></i></span>
                        <span v-if="loading === 0">
                            پرداخت
                        </span>
                        <span v-if="loading === 1">
                            <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
                        </span>
                    </div></div>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-left-top-price-4">
                    <span class="title-5 text-gray"> کالاهای موجود در سبد شما ثبت و رزرو نشده اند , برای ثبت سفارش مراحل بعدی را تکمیل کنید </span>
                </div>
            </div>
        </div>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-bottom delete-padding">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-bottom-1">
                <span><i class="fas fa-shipping-fast"></i></span>
                <span class="title-5 text-gray">  هفت روز ضمانت تعویض </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-bottom-1">
                <span><i class="fas fa-shipping-fast"></i></span>
                <span class="title-5 text-gray">  پرداخت در محل با کارت بانکی   </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-left-bottom-1">
                <span><i class="fas fa-shipping-fast"></i></span>
                <span class="title-5 text-gray">  تحویل اکسپرس   </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "card-left" ,
        props: ['orders' , 'user' , 'payMethod'] ,

        data() {
            return {
                sum: 0 ,
                loading: 0
            }
        } ,

        methods: {
            sendMessage(code) {
                axios({
                    url: '/api/sendMessage' ,
                    method: 'post' ,
                    data: {
                        phone_number: this.user.phone_number,
                        first_name: this.user.first_name,
                        code: code,
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                    }
                })
                    .then(res => {
                        console.log(res);
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            create_orders() {
                // let cost = '';
                // let factor = '';
                // if (this.off > 0)
                // {
                //     cost = this.off
                // }
                // else if (this.off < 0)
                // {
                //     cost = 0;
                // }
                // else
                // {
                //     cost = this.price
                // }

                // if (this.sending_cost)
                // {
                //     cost += this.sending_cost;
                // }
                // if (!this.factor)
                // {
                //     factor = 0;
                // }
                // else
                // {
                //     factor = this.factor;
                // }
                this.loading = 1;
                axios({
                    url: '/api/order/create' ,
                    method: 'post' ,
                    data: {
                        total: this.cost(this.orders) ,
                        products: this.orders ,
                        factor: null
                    } ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        this.loading = 0;
                        console.log(res);
                        localStorage.removeItem('order');
                        this.sendMessage(res.data.order.tracking_code);
                        localStorage.setItem('tracking_code' , res.data.order.tracking_code);
                        window.location.href = '/payment-success'
                    })
                    .catch(err => {
                        this.loading = 0;
                        console.log(err.response);
                        localStorage.removeItem('order');
                        // this.$router.push({ path: '/order/pay/error'})
                    })
            } ,
            where_to_go() {
               if (this.$route.path === '/card/products')
               {
                   if (this.user)
                   {
                       this.$router.push({ path: '/card/address' })
                   }
                   else
                   {
                       this.$toasted.show('لطفا وارد سایت شوید', {
                           position: 'top-center' ,
                           type: 'error' ,
                           theme: 'bubble' ,
                           fitToScreen: true ,
                           fullWidth: true ,
                           className: ['your-custom-class']
                       }).goAway(2000);
                   }
               }
               else if (this.$route.path === '/card/address')
               {
                   if (this.user.first_name && this.user.last_name
                        && this.user.address && this.user.postal_code)
                   {
                       this.$router.push({ path: '/card/pay' })
                   }
                   else
                   {
                       this.$toasted.show('لطفا اطلاعات خود را کامل کنید', {
                           position: 'top-center' ,
                           type: 'error' ,
                           theme: 'bubble' ,
                           fitToScreen: true ,
                           fullWidth: true ,
                           className: ['your-custom-class']
                       }).goAway(2000);
                   }
               }
               else
               {
                   if (this.payMethod === 'offline')
                   {
                        this.create_orders();
                   }
               }
            } ,
            cost(order) {
                let s = 0;
                order.forEach(item => {
                    s += item.final_price1;
                });
                return s;
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
        background: #fff;
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