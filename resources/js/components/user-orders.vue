<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 word-list flex">
            <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-img">
                <span class="title-4">شماره سفارش</span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-name">
                <span class="title-4">مبلغ کل</span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-all">
                <span class="title-4">وضعیت</span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-delete-details">
                <span class="title-4" style="padding-right: 33px;">جزئیات سفارش</span>
            </div>
        </div>
        <ol id="selectable" class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
            <li class="ui-state-default user-list-info-box flex" v-for="item in orders">
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                    <span class="text-span text-gray-p">#{{item.tracking_code}} </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-name">
                    <span class="text-span text-gray-p"> {{item.total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                    <span class="text-span text-gray-p"> {{item.status}}</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                    <router-link :to="'/user/order/details/'+item.id" class="item confirm" data-toggle="tooltip" data-placement="top" title="" data-original-title="تایید">
                        <i class="fas fa-ellipsis-h"></i>
                    </router-link>
                </div>
            </li>
        </ol>
    </div>
</template>

<script>
    export default {
        name: "user-orders" ,
        created() {
            this.get_orders()
        } ,



        data() {
            return {
                orders: []
            }
        } ,

        methods: {
            get_orders() {
                axios({
                    url: '/api/user/orders' ,
                    method: 'get' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    } ,
                })
                    .then(res => {
                        this.orders = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        } ,
    }
</script>

<style scoped>

</style>