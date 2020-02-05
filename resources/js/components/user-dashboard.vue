<template>
    <div class="col-xs col-sm-10 col-6 col-md-2 col-lg-3 col-xl-3 dashboard-page-sidebar-user user delete-padding">
        <div class="list-group">
            <a href="" class="list-group-item list-group-item-action active lga-color">داشبورد </a>
            <router-link to="/user/profile" class="list-group-item list-group-item-action"><i class="fas fa-address-card"></i>پنل کاربری    <i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/user/orders" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign"></i>سفارشات  <i class="fas fa-angle-left icon-left"></i></router-link>
            <a href="" class="list-group-item list-group-item-action active lga-color">پروفایل کاربری  </a>
            <!--<a href="/messages-user" class="list-group-item list-group-item-action"><i class="fas fa-envelope-open"></i>صندوق پیام ها  <i class="fas fa-angle-left icon-left"></i></a>-->
            <router-link to="/user/changePassword" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i>تغییر رمز عبور  <i class="fas fa-angle-left icon-left"></i></router-link>
            <a style="cursor: pointer" onclick="localStorage.removeItem('token'); window.location = '/'" class="list-group-item list-group-item-action"><i class="fas fa-sign-in-alt"></i> خروج  <i class="fas fa-angle-left icon-left"></i></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "user-dashboard"
    }
</script>

<style scoped>

</style>