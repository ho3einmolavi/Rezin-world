<template>
    <div>
        <another-header @first-emit-cat="get_main_categories($event)"></another-header>
        <router-view :main_categories="mainCat"></router-view>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "app" ,

        data() {
            return {
                mainCat: []
            }
        } ,

        methods: {
            get_main_categories(event) {
                this.mainCat = event
            }
        }
    }
</script>

<style scoped>

</style>