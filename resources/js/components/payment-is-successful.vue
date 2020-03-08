<template>
    <div>
        <another-header @setting="get_setting($event)"></another-header>
        <pay-success :pay_id="pay_id"></pay-success>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "payment-is-successful" ,

        props: ['pay_id'] ,

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