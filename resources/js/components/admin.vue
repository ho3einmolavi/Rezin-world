<template>
    <div>
        <another-header @mainCategories="get_second($event)"></another-header>
        <admin-content :main="mainCat"></admin-content>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "admin" ,

        data() {
            return {
                mainCat: []
            }
        } ,

        methods: {
            get_second(event) {
                event.forEach(item => {
                    item.second.forEach( value => {
                        this.mainCat.push(value)
                    })
                });
            }
        }
    }
</script>

<style scoped>

</style>