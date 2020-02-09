<template>
    <div class="col-xs col-sm-1 col-2 col-md-1 col-lg-2 col-xl-1 sidebar-res delete-padding">
        <div class="list-group">
            <router-link to="/user/profile" class="list-group-item list-group-item-action"><i class="fas fa-address-card"></i></router-link>
            <router-link to="/user/orders" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign"></i></router-link>
            <!--<a href="messages-user.html" class="list-group-item list-group-item-action"><i class="fas fa-envelope-open"></i></a>-->
            <router-link to="/user/changePassword" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i></router-link>
            <a style="cursor: pointer" onclick="localStorage.removeItem('token'); window.location = '/'" class="list-group-item list-group-item-action"><i class="fas fa-sign-in-alt"></i></a>
        </div>
    </div>
    <!---END-RES--->

</template>

<script>
    export default {
        name: "user-dashboard-res"
    }
</script>

<style scoped>

</style>