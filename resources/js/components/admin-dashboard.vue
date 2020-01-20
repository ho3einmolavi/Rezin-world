<template>
    <div class="col-xs col-sm-10 col-6 col-md-2 col-lg-3 col-xl-3 dashboard-page-sidebar admin delete-padding">
        <div class="list-group">
            <!--<a href="" class="list-group-item list-group-item-action active lga-color">داشبورد </a>-->
            <!--<a href="dashboard.html" class="list-group-item list-group-item-action"><i class="fas fa-address-card"></i>پنل مدیریت <i class="fas fa-angle-left icon-left"></i></a>-->
            <a href="" class="list-group-item list-group-item-action active lga-color">محصولات</a>
            <router-link to="/admin/categories-list" class="list-group-item list-group-item-action"><i class="fab fa-product-hunt"></i>دسته بندی ها<i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/admin/products-list" class="list-group-item list-group-item-action"><i class="fab fa-product-hunt"></i>  لیست  محصولات<i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/admin/add-product" class="list-group-item list-group-item-action"><i class="fab fa-adversal"></i> افزودن محصولات <i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/admin/add-discount" class="list-group-item list-group-item-action"><i class="fas fa-align-right"></i> افزودن کد تخفیف <i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/admin/add-category" class="list-group-item list-group-item-action"><i class="fas fa-align-center"></i> افزودن  دسته بندی<i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/admin/edit-baners" class="list-group-item list-group-item-action"><i class="fas fa-sliders-h"></i> ویرایش بنر ها<i class="fas fa-angle-left icon-left"></i></router-link>
            <!--<a href="" class="list-group-item list-group-item-action active lga-color">پروفایل کاربری  </a>-->
            <!--<a href="messages.html" class="list-group-item list-group-item-action"><i class="fas fa-envelope-open"></i>صندوق پیام ها  <i class="fas fa-angle-left icon-left"></i></a>-->
            <!--<a href="change-password.html" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i>تغییر رمز عبور  <i class="fas fa-angle-left icon-left"></i></a>-->
            <a href="" class="list-group-item list-group-item-action active lga-color"> مشتری ها </a>
            <router-link to="/admin/users" class="list-group-item list-group-item-action"><i class="fas fa-list-ul"></i> لیست مشتری ها <i class="fas fa-angle-left icon-left"></i></router-link>
            <router-link to="/admin/orders-list" class="list-group-item list-group-item-action"><i class="fas fa-dollar-sign"></i>  لیست  سفارشات <i class="fas fa-angle-left icon-left"></i></router-link>
            <!--<a href="#" class="list-group-item list-group-item-action disabled"><i class="fas fa-list-ol"></i> آمار فروش <i class="fas fa-angle-left icon-left"></i></a>-->
            <!--<router-link to="/admin/add-dis" class="list-group-item list-group-item-action disabled"><i class="far fa-list-alt"></i> افزودن کد تخفیف <i class="fas fa-angle-left icon-left"></i></router-link>-->
            <router-link to="/admin/setting" class="list-group-item list-group-item-action"><i class="fas fa-cogs"></i> تنظیمات  <i class="fas fa-angle-left icon-left"></i></router-link>
            <a class="list-group-item list-group-item-action"><i class="fas fa-sign-in-alt"></i> خروج  <i class="fas fa-angle-left icon-left"></i></a>
        </div>
    </div>
</template>

<script>
    export default {
        name: "admin-dashboard"
    }
</script>

<style scoped>

</style>