<template>
    <div>
        <another-header @setting="get_setting($event)" @user="get_user($event)" :order="orders1"  @add-order="get_order($event)"></another-header>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 content-card">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card flex">
                <router-view
                        @final-cost="get_final_price($event)"
                        :orders="orders"
                        @send_number="get_number($event)"
                        :show="user"
                        @check-user="get_user($event)"
                        @pay-method="get_pay_method($event)"
                        @cost-after-off="get_cost($event)"
                        :setting="setting_data"
                        @factor="get_factor($event)"
                >
                </router-view>
                <card-left
                        :orders="orders"
                        :user="user"
                        :payMethod="payMethod"
                        :cost_after_off="cost_after_off"
                        :setting="setting_data"
                        :factor="factor"
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
                payMethod: '' ,
                cost_after_off: null ,
                factor: null ,
                setting_data: null
            }
        } ,

        methods: {
            get_factor(event) {
               this.factor = event
            } ,
            get_setting(event) {
                this.setting_data = event
            } ,
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
            } ,
            get_cost(event) {
                this.cost_after_off = event
            }
        }
    }
</script>

<style scoped>

</style>