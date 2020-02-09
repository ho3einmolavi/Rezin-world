<template>
    <div>
        <another-header @setting="get_setting($event)"></another-header>
        <section>
            <center>
                <div class="col col-sm col-xs col-md col-lg col-xl-12 dashboard-page flex">
                    <user-dashboard></user-dashboard>
                    <user-dashboard-res></user-dashboard-res>

                    <router-view></router-view>
                </div>
            </center>
        </section>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "user" ,
        data() {
            return {
                setting: []
            }
        } ,

        methods: {
            get_setting(event) {
                this.setting = event
            },
        }
    }
</script>

<style scoped>

</style>