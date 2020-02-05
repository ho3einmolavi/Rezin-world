<template>
    <div>
        <another-header :order="orders"></another-header>
        <single-product-feature @send_number="get_order($event)"></single-product-feature>
        <hr class="hr-end-box">
        <single-same-products @newest-products="get_products($event)"></single-same-products>
        <single-newest-products :products="products"></single-newest-products>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "single" ,

        data() {
            return {
                orders: [] ,
                products: []
            }
        } ,

        methods: {
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