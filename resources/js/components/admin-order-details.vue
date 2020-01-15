<template>
    <div v-if="ok === 1" class="col-md-9 col-10 users-main delete-padding-left">
        <div class="information-page-content-title">
            <div class="col-md-12 information-page-content-title-inside">
                <h5 class="title-all-h5">جزئیات سفارش مشتریان </h5>
                <p class="title-all-p title-4">
                    شرکت سارین وب تیم متشکل 25 نفراز توسعه دهنگان و طراحان سایت است که توجه ویژه ای بر جنبه های توسعه UX دارند
                </p>
            </div>
        </div>
        <div class="col-md-12 orderr-bottom flex">
            <div class="col-md-6 orderr-bottom-right">
                <div class="orderr-bottom-right-inside">
                    <span class="title-4">  نام و نام خانوادگی  :</span><span class="title-4"> {{order.user.first_name}} {{order.user.last_name}} </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4">  سفارش : </span><span class="title-4">{{order.order.tracking_code}}</span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4"> محصول :  </span><span class="title-4"> {{products.toString()}} </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4">  استان : </span><span class="title-4">{{order.user.state}}</span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4">  شهر :</span><span class="title-4"> {{order.user.city}} </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4"> آدرس  : </span><span class="title-4"> {{order.user.address}} </span>
                </div>
            </div>
            <div class="col-md-6 orderr-bottom-left">
                <div class="orderr-bottom-right-inside">
                    <span class="title-4"> شماره همراه :</span><span class="title-4"> {{order.user.phone_number}} </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4">  شماره ثابت  : </span><span class="title-4"> {{order.user.phone}} </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4">  کد پستی :  </span><span class="title-4"> {{order.user.postal_code}} </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4"> یادداشت  : </span><span class="title-4"> بسیار عجله دارم! </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4"> روش پرداخت  : </span><span class="title-4"> درگاه پرداخت زرین پال </span>
                </div>
                <div class="orderr-bottom-right-inside">
                    <span class="title-4"> سفارش :  </span><span class="title-4 c-stop">{{order.order.status}}</span>
                    <button class="btn btn btn-success" style="font-family: irs" v-if="admin === 1 && order.order.status === 'در حال بررسی'" type="button" @click="verifyOrder(order.order.id)">تایید این سفارش</button>
                </div>
            </div>
        </div>

        <div class="col-md-12 delete-padding">
            <table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                <thead>
                <tr>
                    <th scope="col" class="title-4">ردیف</th>
                    <th scope="col" class="title-4">  نام محصول </th>
                    <th scope="col" class="title-4">  تعداد</th>
                    <th scope="col" class="title-4"> قیمت واحد</th>
                    <th scope="col" class="title-4">  تخفیف </th>
                    <th scope="col" class="title-4">  قیمت کل </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item , index) in order_products">
                    <th scope="row">{{index + 1}}</th>
                    <td class="title-4">{{item.title}}</td>
                    <td class="title-4">{{item.number}} <span> عدد </span></td>
                    <td class="title-4">{{item.price}} <span>تومان </span></td>
                    <td class="title-4">{{item.discount}}</td>
                    <td class="title-4">{{item.total}} <span> تومان </span></td>
                </tr>
                </tbody>
            </table>
            <div class="co-md-12 invoice-product">
                <span class="title-4"> جمع فاکتور   <span class="title-4">{{order.order.total}}</span> <span class="title-4"> تومان </span> </span>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "admin-order-details" ,

        created() {
            this.makeSure(this.$route.params.ID);
        } ,

        data() {
            return {
                order: [] ,
                ok: '' ,
                products: [] ,
                order_products: [] ,
                products_id: [] ,
                orders_id: [] ,
                admin: ''
            }
        } ,

        methods: {
            verifyOrder(id) {
                axios({
                    url: `/api/verify/order/${id}` ,
                    method: 'get' ,
                    headers: {
                        Accept: 'application/json' ,
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.makeSure(id);
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            makeSure(id) {

                axios({
                    url: `/api/check/order/${id}` ,
                    method: 'get' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        this.products = [];
                        console.log(res);
                        this.ok = 1;
                        this.order = res.data;
                        res.data.products.forEach(item => {
                            this.products.push(item.title)
                        });

                        res.data.products.forEach(item => {
                            this.products_id.push(item.pivot.product_id);
                            this.orders_id.push(item.pivot.order_id);
                        });

                        this.admin = res.data.check;
                        this.get_order_products();
                    })
                    .catch(err => {
                        console.log(err.response);
                        window.location = '/404'
                    })
            } ,
            get_order_products() {
                axios({
                    url: '/api/find/products/order' ,
                    method: 'post' ,
                    headers: {
                        Accept: 'application/json' ,
                    } ,
                    data: {
                        products: this.products_id ,
                        orders: this.orders_id
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.order_products = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        }
    }
</script>

<style scoped>

</style>