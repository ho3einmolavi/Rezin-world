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


const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
    // customClass: {
    //     'font-family': irs
    // }
};


Vue.use(VueSweetalert2, options);
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

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

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
    {path: '/admin/adminOrdersDetails/:ID',name:'admin',component:require('./components/admin-order-details.vue').default } ,
    {path: '/admin/products-list',name:'admin',component:require('./components/products-list.vue').default } ,
    {path: '/admin/setting',name:'admin',component:require('./components/setting.vue').default } ,
    {path: '/admin/edit-baners',name:'admin',component:require('./components/edit-baners.vue').default } ,
    {path: '/single/:productID',name:'single',component:require('./components/single.vue').default } ,

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
