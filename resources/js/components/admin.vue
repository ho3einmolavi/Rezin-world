<template>
    <div>
        <div v-if="ok === 1">
            <another-header @setting="get_setting($event)" @mainCategories="get_second($event)"></another-header>
            <admin-content :allCats="allCats" :main="mainCat"></admin-content>
            <main-footer :setting="setting"></main-footer>
        </div>
        <forbidden v-if="ok === 0"></forbidden>
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
                ok: ''
            }
        } ,

        created() {
            this.checkForAdmin();
        } ,

        methods: {
            checkForAdmin() {
                axios({
                    method: 'get' ,
                    url: '/api/check/admin' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                    })
                    .catch(err => {
                        this.ok = 0;
                        console.log(err.response);
                    })
            } ,
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