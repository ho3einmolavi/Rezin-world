<template>
    <div>
        <another-header></another-header>
        <section>
            <center>
                <div class="col col-sm col-xs col-md col-lg col-xl-12 dashboard-page flex">
                    <user-dashboard></user-dashboard>
                    <user-dashboard-res></user-dashboard-res>

                    <router-view></router-view>
                </div>
            </center>
        </section>
        <main-footer></main-footer>
    </div>
</template>

<script>
    export default {
        name: "user"
    }
</script>

<style scoped>

</style>