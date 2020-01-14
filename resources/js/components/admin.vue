<template>
    <div>
        <another-header></another-header>
        <section>
            <center>
                <div class="col-xs col-sm col col-md col-lg col-xl-12 dashboard-page flex">
                    <admin-dashboard></admin-dashboard>
                    <admin-dashboard-res></admin-dashboard-res>
                    <router-view></router-view>
                </div>
            </center>
        </section>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "admin"
    }
</script>

<style scoped>

</style>