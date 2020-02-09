<template>
    <div>
        <main-header @setting="get_setting($event)"></main-header>
        <index-content></index-content>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "index" ,
        created() {
            localStorage.removeItem('tracking_code')
        } ,

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