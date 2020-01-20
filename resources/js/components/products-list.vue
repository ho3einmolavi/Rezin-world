<template>
    <div class="col-xs col-sm col-10 col-md-10 col-lg-9 col-xl-9 users-main delete-padding">
        <div class="user-list-page">
            <div class="user-list-manage-box">
                <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                    <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                        <div class="input-group-prepend button-name-doctor">
                            <button class="btn btn-outline-secondary" v-on:click="search('products' , 'title')"  type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                        </div>
                        <input style="text-align: right;font-size: 12px;" v-model="query" v-on:change="search('products' , 'title')" type="text" class="form-control input-form-control" placeholder="نام دسته مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
            </div>


            <ol v-if="ok === 1" id="selectable" class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
                <li v-bind:class="[{ 'slide-red' : product.slideShow , 'text-white': product.slideShow}]" class="ui-state-default user-list-info-box flex" v-for="product in products" v-bind:key="product.id">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                        <img :src="'/images/products/' + product.product_img">
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-1 user-list-info-box-name">
                        <span class="text-span text-gray-p"> {{product.title}}  </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-city">
                        <span class="text-span  text-gray-p">{{product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان  </span>
                    </div>

                    <div class="col-xs col-sm col- col-md col-lg col-xl-3 user-list-info-box-email">
                        <span class="text-span text-gray-p" v-if="product.number"> موجود در انبار </span>
                        <span class="text-span" style="color: red" v-else> ناموجود </span>
                    </div>

                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                        <router-link :to="'/product/'+product.id" id="error23" class="item delete" data-toggle="tooltip" data-placement="top" title="جزئیات" data-original-title="حذف ">
                            <i class="fas fa-ellipsis-h"></i>
                        </router-link>
                        <a v-on:click="delete_product(product.id)" id="error2" class="item delete" data-toggle="tooltip" data-placement="top" title="حذف" data-original-title="حذف ">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <a  v-on:click="add_slideShow(product.id)" id="errdor2" class="item delete" data-toggle="tooltip" data-placement="top" title="افزودن به اسلاید شو" data-original-title="حذف ">
                            <i class="fas fa-check-circle"></i>
                        </a>
                    </div>
                </li>
            </ol>

            <div v-if="ok === 0" class="alert alert-danger">
                محصولی یافت نشد
            </div>

        </div>
    </div>
</template>

<script>
    export default {

        created() {
            console.log('products-list-content component');
            this.showProducts();
        },

        data() {
            return {
                products: [],
                query: '',
                ok: '' ,

            }
        },

        methods: {
            add_slideShow(id) {
                axios({
                    url: `/api/addtoslideshow/${id}`,
                    method: 'get',
                })
                    .then(res => {
                        console.log(res);
                        this.showProducts();
                        this.$toasted.success(res.data.message , {
                            position: 'bottom-center' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            className: ['your-custom-class']
                        }).goAway(1500);
                    })
                    .catch(err => {
                        console.log(err.response);
                        err.response.data.forEach(item => {
                            this.$toasted.error(item.toString() , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(3000);
                        });
                    })
            } ,
            showProducts() {
                axios({
                    url: '/api/index',
                    method: 'get',
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.products = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                    })
            },

            search(table, param) {
                axios({
                    url: `/api/search/${table}/${param}`,
                    method: 'post',
                    data: {
                        q: this.query
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.products = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                    })
            },
            delete_product(id) {
                if (confirm('آیا از حذف کردن این محصول مطمئن هستید؟؟؟')) {
                    axios({
                        url: `/api/products/${id}/delete`,
                        method: 'get',
                    })
                        .then(res => {
                            console.log(res);
                            this.$toasted.success('product is deleted', {
                                position: 'bottom-center',
                                theme: 'bubble',
                                fitToScreen: true
                            }).goAway(1500);
                            this.showProducts();
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$toasted.error(err.response.data, {
                                position: 'bottom-center',
                                theme: 'bubble',
                                fitToScreen: true
                            }).goAway(3000);
                        })
                }
            },
        }
    }

</script>

<style scoped>
    .slide-red {
        background-color: #ff7a76 ;
    }
</style>