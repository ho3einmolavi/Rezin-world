<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding">
        <div class="user-list-page">
            <div class="user-list-manage-box">
                <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                    <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                        <div class="input-group-prepend button-name-doctor">
                            <button class="btn btn-outline-secondary" @click="search" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                        </div>
                        <input style="text-align: right;font-size: 12px;" v-model="query" @keypress.enter="search" type="text" class="form-control input-form-control" placeholder="کد پیگیری سفارش مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  word-list flex">
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-img">
                    <span class="title-4"> کد پیگیری </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-3  word-list-name">
                    <span class="title-4">  تاریخ سفارش</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-des">
                    <span class="title-4">  وضعیت</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-ads">
                    <span class="title-4"> مجموع</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-3 word-list-delete-details">
                    <span class="title-4" style="padding-right: 33px;">  جزئیات سفارش</span>
                </div>
            </div>



            <div v-if="error === 1" class="alert alert-danger">سفارشی یافت نشد</div>
            <ol v-if="error === 0" id="selectable" class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
                <li v-for="item in orders" class="ui-state-default user-list-info-box flex">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                        <span class="text-span title-4">   {{item.order.tracking_code}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-3 user-list-info-box-name">
                        <span class="text-span title-4"> {{item.date}} در ساعت {{item.time}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                        <span class="text-span title-4 c-stop" >  {{item.order.status}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-email">
                        <span class="text-span title-4">  {{item.order.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-3 table-data-feature flex">
                        <router-link :to="'/admin/order/details/'+item.order.id" class="item confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="تایید">
                            <i class="fas fa-ellipsis-h"></i>
                        </router-link>
                        <a id="error2" @click="delete_order(item.order.id)" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>

<script>
    export default {
        name: "orders-list" ,
        created() {
            this.get_orders();
        } ,

        data() {
            return {
                orders: [] ,
                query: '' ,
                error: 0
            }
        } ,
        methods: {
            search() {
                axios({
                    url: `/api/search/orders/tracking_code` ,
                    method: 'post' ,
                    data: {
                        q: this.query
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.error = 0;
                        this.orders = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.error = 1
                    })
            } ,
            delete_order(id) {
                if (confirm('آیا از حذف کردن این سفارش مطمئن هستید؟؟؟'))
                {
                    axios({
                        url: `/api/orders/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            console.log(res);
                            this.$toasted.success('order is deleted' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true
                            }).goAway(1500);
                            this.get_orders();
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$toasted.error(err.response.data , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true
                            }).goAway(3000);
                        })
                }
            } ,
            get_orders() {
                axios({
                    url: '/api/orders' ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.orders = res.data;
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