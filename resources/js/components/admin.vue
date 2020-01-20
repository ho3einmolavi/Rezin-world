<template>
    <div>
        <another-header @mainCategories="get_second($event)"></another-header>
        <admin-content :allCats="allCats" :main="mainCat"></admin-content>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "admin" ,

        data() {
            return {
                mainCat: [] ,
                allCats: [] ,
            }
        } ,

        methods: {
            get_second(event) {
                event.forEach(item => {
                    item.second.forEach( value => {
                        this.mainCat.push(value)
                    })
                });
                this.allCats = event
            }
        }
    }
</script>

<style scoped>

</style>