/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
import Vue from 'vue'
import VueRouter from 'vue-router'
import Toasted from 'vue-toasted';
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Install BootstrapVue
Vue.use(BootstrapVue);
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin);


const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
    className: 'your-custom-class'
    // customClass: {
    //     'font-family': irs
    // }
};


Vue.use(VueSweetalert2, options);
Vue.use(VuePersianDatetimePicker , {
    props: {
        color: '#ff7a76',
    }
});
Vue.component('date-picker', VuePersianDatetimePicker);
Vue.use(Toasted);
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */



Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-header', require('./components/main-header.vue').default);
Vue.component('index', require('./components/index.vue').default);
Vue.component('main-footer', require('./components/main-footer.vue').default);
Vue.component('index-content', require('./components/index-content.vue').default);
Vue.component('index-products', require('./components/index-products.vue').default);
Vue.component('index-information', require('./components/index-information.vue').default);
Vue.component('app', require('./components/app.vue').default);
Vue.component('products', require('./components/products.vue').default);
Vue.component('another-header', require('./components/another-header.vue').default);
Vue.component('admin', require('./components/admin.vue').default);
Vue.component('admin-dashboard-res', require('./components/admin-dashboard-res.vue').default);
Vue.component('admin-dashboard', require('./components/admin-dashboard.vue').default);
Vue.component('add-products', require('./components/add-products.vue').default);
Vue.component('add-category', require('./components/add-category.vue').default);
Vue.component('add-discount', require('./components/add-discount.vue').default);
Vue.component('edit-product', require('./components/edit-product.vue').default);
Vue.component('category-list', require('./components/category-list.vue').default);
Vue.component('users', require('./components/users.vue').default);
Vue.component('orders-list', require('./components/orders-list.vue').default);
Vue.component('admin-order-details', require('./components/admin-order-details.vue').default);
Vue.component('products-list', require('./components/products-list.vue').default);
Vue.component('setting', require('./components/setting.vue').default);
Vue.component('edit-baners', require('./components/edit-baners.vue').default);
Vue.component('admin-content', require('./components/admin-content.vue').default);
Vue.component('single', require('./components/single.vue').default);
Vue.component('single-product-feature', require('./components/single-product-feature.vue').default);
Vue.component('single-same-products', require('./components/single-same-products.vue').default);
Vue.component('single-newest-products', require('./components/single-newest-products.vue').default);
Vue.component('comments-list', require('./components/comments-list.vue').default);
Vue.component('add-post', require('./components/add-post.vue').default);
Vue.component('articles', require('./components/articles.vue').default);
Vue.component('card', require('./components/card.vue').default);
Vue.component('card-products', require('./components/card-products.vue').default);
Vue.component('card-left', require('./components/card-left.vue').default);
Vue.component('card-address', require('./components/card-address.vue').default);
Vue.component('card-pay', require('./components/card-pay.vue').default);
Vue.component('pay-success', require('./components/pay-success.vue').default);
Vue.component('user', require('./components/user.vue').default);
Vue.component('user-dashboard', require('./components/user-dashboard.vue').default);
Vue.component('user-dashboard-res', require('./components/user-dashboard-res.vue').default);
Vue.component('user-profile', require('./components/user-profile.vue').default);
Vue.component('user-orders', require('./components/user-orders.vue').default);
Vue.component('user-order-details', require('./components/user-order-details.vue').default);
Vue.component('user-changePassword', require('./components/user-changePassword.vue').default);
Vue.component('special-discount', require('./components/special-discount.vue').default);
Vue.component('edit-article', require('./components/edit-article.vue').default);
Vue.component('about-us', require('./components/about-us.vue').default);
Vue.component('contact-us', require('./components/contact-us.vue').default);
Vue.component('about', require('./components/about.vue').default);
Vue.component('payment-is-successful', require('./components/payment-is-successful.vue').default);
Vue.component('payment-failed', require('./components/payment-failed.vue').default);
Vue.component('pay-error', require('./components/pay-error.vue').default);





const routes = [
    // {path: '/products' , component:require('./components/products.vue').default},
    {path: '/products/category/:id' ,name:'product' , meta:{title: 'محصولات'} ,component:require('./components/products.vue').default } ,
    {path: '/products/search/:title',name:'product' , meta:{title: 'محصولات'} ,component:require('./components/products.vue').default } ,
    {path: '/products/category/:main/second/:sec',name:'product' , meta:{title: 'محصولات'} ,component:require('./components/products.vue').default } ,
    {path: '/product/:productID' ,name: 'admin', component:require('./components/edit-product.vue').default } ,
    {path: '/admin/categories-list',name:'admin',component:require('./components/category-list.vue').default } ,
    {path: '/admin/add-product',name:'admin',component:require('./components/add-products.vue').default } ,
    {path: '/admin/add-category',name:'admin',component:require('./components/add-category.vue').default } ,
    {path: '/admin/add-discount',name:'admin',component:require('./components/add-discount.vue').default } ,
    {path: '/admin/users',name:'admin',component:require('./components/users.vue').default } ,
    {path: '/admin/orders-list',name:'admin',component:require('./components/orders-list.vue').default } ,
    {path: '/admin/order/details/:ID',name:'admin',component:require('./components/admin-order-details.vue').default } ,
    {path: '/admin/products-list',name:'admin',component:require('./components/products-list.vue').default } ,
    {path: '/admin/setting',name:'admin',component:require('./components/setting.vue').default } ,
    {path: '/admin/edit-baners',name:'admin',component:require('./components/edit-baners.vue').default } ,
    {path: '/admin/comments',name:'admin',component:require('./components/comments-list.vue').default } ,
    {path: '/admin/articles',name:'admin',component:require('./components/articles.vue').default } ,
    {path: '/admin/add-post',name:'admin',component:require('./components/add-post.vue').default } ,
    {path: '/admin/add-special-discount',name:'admin',component:require('./components/special-discount.vue').default } ,
    {path: '/admin/update-article/:articleID',name:'admin',component:require('./components/edit-article.vue').default } ,
    {path: '/single/:productID',name:'single',component:require('./components/single.vue').default } ,
    {path: '/card/products',name:'card',component:require('./components/card-products.vue').default } ,
    {path: '/card/address',name:'card',component:require('./components/card-address.vue').default } ,
    {path: '/card/pay',name:'card',component:require('./components/card-pay.vue').default } ,
    {path: '/user/profile',name:'card',component:require('./components/user-profile.vue').default } ,
    {path: '/user/orders',name:'card',component:require('./components/user-orders.vue').default } ,
    {path: '/user/order/details/:orderID',name:'card',component:require('./components/user-order-details.vue').default } ,
    {path: '/user/changePassword',name:'card',component:require('./components/user-changePassword.vue').default } ,
    {path: '/about-us',name:'card',component:require('./components/about-us.vue').default } ,
    {path: '/contact-us',name:'card',component:require('./components/contact-us.vue').default } ,

];

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const router = new VueRouter({
    mode: 'history' ,
    routes // short for `routes: routes`
});


const app = new Vue({
    router ,
    el: '#app',
});
