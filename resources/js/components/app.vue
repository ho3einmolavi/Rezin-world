<template>
    <div>
        <another-header :order="order" @first-emit-cat="get_main_categories($event)"></another-header>
        <router-view :main_categories="mainCat" @send_number="get_price_order($event)"></router-view>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "app" ,

        data() {
            return {
                mainCat: [] ,
                order: []
            }
        } ,

        methods: {
            get_price_order(event){
                this.order = event
            } ,
            get_main_categories(event) {
                this.mainCat = event
            }
        }
    }
</script>

<style scoped>

</style>