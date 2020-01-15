<template>
    <section>
        <center>
            <div class="col-xs col-sm col col-md col-lg col-xl-12 dashboard-page flex">
                <admin-dashboard></admin-dashboard>
                <admin-dashboard-res></admin-dashboard-res>
                <router-view :second_categories="main"></router-view>
            </div>
        </center>
    </section>
</template>

<script>
    export default {
        name: "admin-content" ,
        props: ['main']
    }
</script>

<style scoped>

</style>