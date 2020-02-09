<template>
    <div>
        <another-header @setting="get_setting($event)"></another-header>
        <pay-error></pay-error>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "payment-failed" ,

        data() {
            return {
                setting: []
            }
        } ,

        methods:{
            get_setting(event) {
                this.setting = event
            },
        }
    }
</script>

<style scoped>

</style>