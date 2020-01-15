<template>
    <div class="col-xs col-sm-1 col-2 col-md-1 col-lg-2 col-xl-1 sidebar-res delete-padding">
        <div class="list-group">
            <!--<a href="dashboard.html" class="list-group-item list-group-item-action"><i class="fas fa-address-card"></i></a>-->
            <router-link to="/admin/categories-list" class="list-group-item list-group-item-action"><i class="fas fa-align-justify"></i></router-link>
            <router-link to="/admin/products-list" class="list-group-item list-group-item-action"><i class="fab fa-product-hunt"></i></router-link>
            <router-link to="/admin/add-product" class="list-group-item list-group-item-action"><i class="fab fa-adversal"></i></router-link>
            <router-link to="/admin/add-category" class="list-group-item list-group-item-action"><i class="fas fa-align-center"></i></router-link>
            <router-link to="/admin/add-discount" class="list-group-item list-group-item-action"><i class="fas fa-align-right"></i></router-link>
            <router-link to="/admin/add-slideShow" class="list-group-item list-group-item-action"><i class="fas fa-sliders-h"></i></router-link>
            <!--<a href="messages.html" class="list-group-item list-group-item-action"><i class="fas fa-envelope-open"></i></a>-->
            <!--<a href="change-password.html" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i></a>-->
            <router-link to="/admin/users" class="list-group-item list-group-item-action"><i class="fas fa-list-ul"></i></router-link>
            <router-link to="/admin/orders-list" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign"></i></router-link>
            <a href="#" class="list-group-item list-group-item-action disabled"><i class="fas fa-list-ol"></i></a>
            <!--<a href="list-Coupons.html" class="list-group-item list-group-item-action disabled"><i class="far fa-list-alt"></i></a>-->
            <router-link to="/admin/setting" class="list-group-item list-group-item-action"><i class="fas fa-cogs"></i></router-link>
            <a class="list-group-item list-group-item-action"><i class="fas fa-sign-in-alt"></i></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "admin-dashboard-res"
    }
</script>

<style scoped>

</style>