<template>
    <div>
        <main-header></main-header>
        <index-content></index-content>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "index" ,
        created() {
            localStorage.removeItem('tracking_code')
        }
    }
</script>

<style scoped>

</style>