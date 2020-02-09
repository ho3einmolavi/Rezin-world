<template>
    <div>
        <another-header @setting="get_setting($event)" @mainCategories="get_second($event)"></another-header>
        <admin-content :allCats="allCats" :main="mainCat"></admin-content>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "admin" ,

        data() {
            return {
                mainCat: [] ,
                allCats: [] ,
                setting: [] ,
            }
        } ,

        methods: {
            get_setting(event) {
                this.setting = event
            },
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