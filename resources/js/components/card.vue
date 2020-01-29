<template>
    <div>
        <another-header @user="get_user($event)" :order="orders1"  @add-order="get_order($event)"></another-header>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 content-card">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card flex">
                <router-view
                        @final-cost="get_final_price($event)"
                        :orders="orders"
                        @send_number="get_number($event)"
                        :show="user"
                        @check-user="get_user($event)"
                        @pay-method="get_pay_method($event)"
                >
                </router-view>
                <card-left
                        :orders="orders"
                        :user="user"
                        :payMethod="payMethod"
                ></card-left>
            </div>

            <!--end-body-->
        </div>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "card" ,

        data() {
            return {
                orders: [] ,
                orders1: [] ,
                final_price: '' ,
                user: null ,
                payMethod: ''
            }
        } ,

        methods: {
            get_pay_method(event) {
                this.payMethod = event
            } ,
            get_user(event) {
               this.user = event;
            } ,
            get_final_price(event) {
                this.final_price = event
            } ,
            get_number(event) {
                this.orders1 = event
            } ,
            get_order(event) {
                this.orders = event
            }
        }
    }
</script>

<style scoped>

</style>