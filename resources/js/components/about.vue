<template>
    <div>
        <another-header @setting="get_setting($event)"></another-header>
        <router-view :setting="setting"></router-view>
        <main-footer :setting="setting"></main-footer>
    </div>
</template>

<script>
    export default {
        name: "about" ,
        methods: {
            get_setting(event) {
                this.setting = event
            },
        } ,
        data() {
            return {
                setting: []
            }
        }
    }
</script>

<style scoped>

</style>