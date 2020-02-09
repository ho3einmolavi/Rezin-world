<template>
    <div>
        <another-header @setting="get_setting($event)" :order="order" @first-emit-cat="get_main_categories($event)"></another-header>
        <router-view :main_categories="mainCat" @send_number="get_price_order($event)"></router-view>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "app" ,

        data() {
            return {
                mainCat: [] ,
                order: [] ,
                setting: [] ,
            }
        } ,

        methods: {
            get_setting(event) {
                this.setting = event
            },
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