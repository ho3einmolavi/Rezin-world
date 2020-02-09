<template>
    <div>
        <another-header @setting="get_setting($event)"  :order="orders"></another-header>
        <single-product-feature @send_number="get_order($event)"></single-product-feature>
        <hr class="hr-end-box">
        <single-same-products @send_number="get_order($event)" @newest-products="get_products($event)"></single-same-products>
        <single-newest-products @send_number="get_order($event)" :products="products"></single-newest-products>
        <main-footer :setting="setting_data"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "single" ,

        data() {
            return {
                orders: [] ,
                products: [] ,
                setting_data: []
            }
        } ,

        methods: {
            get_setting(event) {
                this.setting_data = event
            } ,
            get_products(event) {
               this.products = event;
            } ,
            get_order(event) {
                this.orders = event
            }
        }
    }
</script>

<style scoped>

</style>