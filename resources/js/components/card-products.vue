<template>
    <div class="col-xs col-sm col- col-md-9 col-lg-9 col-xl-9  buy-card-right">
        <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-right-top">
            <span> سبد خرید  </span>
        </div>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-right-bottom delete-padding">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-right-bottom-subject">
                <span class="Bearing title-4"><i class="fas fa-shipping-fast"></i> </span>
                <span class="title-4"> ارسال  سریع</span>
                <span class="title-4"> ({{orders1.length}} کالا) </span>
            </div>
            <hr class="hr-card">
            <div v-for="item in orders1" class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-right-bottom-content flex">
                <div class="col-xs col-sm-2 col- col-md-2 col-lg-2 col-xl-2 buy-card-right-img">
                    <img :src="'/images/products/' + item.images[0]">
                </div>
                <div class="col-xs col-sm-4 col- col-md-4 col-lg-4 col-xl-4 buy-card-right-des">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-1">
                        <span class="title-4 text-black"> رزین ولد برند دیجی عالی </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-2">
                        <span class="title-4 text-black"> فروشنده : رزین ولد </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-3">
                        <span class="title-4 text-black">  گارانتی  اصالت و سلامت  فیزیکی کالا </span>
                    </div>
                </div>
                <div class="col-xs col-sm-3 col- col-md-3 col-lg-2 col-xl-2 buy-card-right-number">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-number-top">
                        <span class="title-4 text-black">  تعداد </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-number-bottom">
                        <div class="wrapper">
                            <div class="control" id="minus" @click="reducePro(item)">-</div>
                            <div id="number">{{item.order_number}}</div>
                            <div class="control" id="plus" @click="increasePrd(item)">+</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs col-sm-3 col- col-md-3 col-lg-4 col-xl-4 buy-card-right-price">
                    <div v-if="item.price !== item.final_price" class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-price-1">
                        <span   class="title-5 text-gray"> {{item.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان  </span>
                    </div>
                    <div v-else class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-price-1-off">
                        <span class="title-5 text-gray"> {{item.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان  </span>
                    </div>
                    <div  class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-price-2">
                        <span class="title-5 text-gray" v-if="item.price !== item.final_price"> قیمت فروش ویژه : <span class="title-5"> {{item.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان </span>  </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-12 buy-card-right-price-3">
                        <span class="title-4 text-black">  مجموع :<span></span> {{item.final_price1.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "card-products" ,
        // props: ['orders'] ,

        created() {
            this.get_products();
            this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));
        } ,

        data() {
            return {
                sum: 0 ,
                orders1: []
            }
        } ,

        methods: {
            get_products() {
                this.orders1 =  JSON.parse(localStorage.getItem('order'));
                console.log(this.orders1)
            } ,
            reducePro(product) {
                let arr = this.orders1;
                arr.forEach(item => {
                    if (item.id === product.id)
                    {
                        if (item.order_number !== 1)
                        {
                            item.order_number --;
                            item.final_price1 = item.final_price * item.order_number;
                        }
                        else {
                            let index = arr.indexOf(item);
                            if (index > -1)
                            {
                                arr.splice(index, 1);
                            }
                        }
                    }
                });
                localStorage.setItem('order' , JSON.stringify(arr));
                this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));

            } ,
            increasePrd(product) {
                let arr = this.orders;
                arr.forEach(item => {
                    if (item.id === product.id)
                    {
                        item.order_number ++;
                        item.final_price1 = item.final_price * item.order_number;
                    }
                });
                localStorage.setItem('order' , JSON.stringify(arr));
                this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));

            } ,
        }
    }
</script>

<style scoped>

</style>