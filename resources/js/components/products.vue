<template>
    <!---------------------body----------------------------->
    <div class="col col-sm col-xs col-md col-lg col-xl-12 body-main delete-padding">
        <div class="col col-sm col-xs col-md col-lg col-xl-12 product-main-Location-all flex">
            <div class="col col-sm col-xs col-md col-lg col-xl-3 product-main-Location">
                <span class="title-4 text-black"> صفحه اصلی  </span>
                <span class="text-black"><i class="fas fa-angle-left"></i></span>
                <span class="title-4 text-black"> محصولات </span>
            </div>
            <div class="col col-sm col-xs col-md col-lg col-xl-9 tag-product">
                <div class="tag-pc table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                    <router-link v-for="item in main_categories.second" :to="'/products/category/' + main_categories.id + '/second/' + item.name" v-bind:key="item.id" class="button white">{{item.name}} </router-link>
                </div>
            </div>
        </div>
        <div class="col col-sm col-xs col-md col-lg col-xl-12 product-main flex">
            <!--sidebar-->
            <div class="col col-sm-4 col-xs col-md-3 col-lg-3 col-xl-3 product-page-right">
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-right-main-one delete-padding">
                    <ul class="dropdown-list-container">
                        <li class="dropdown-list">
                            <a href="#" dropdown-prop="title">رنگ بندی محصولات <i class="dropdown-icon"></i></a>
                            <ul class="dropdown-list-items">
                                <label><input type="checkbox" name="checkbox" value="1">رنگ اول
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ دوم
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ سوم
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ چهارم
                                </label><br>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-right-main-two delete-padding">
                    <ul class="dropdown-list-container">
                        <li class="dropdown-list">
                            <a href="#" dropdown-prop="title"> برند محصولات <i class="dropdown-icon"></i></a>
                            <ul class="dropdown-list-items">
                                <label><input type="checkbox" name="checkbox" value="1">رنگ اول
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ دوم
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ سوم
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ چهارم
                                </label><br>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-right-main-three delete-padding">
                    <ul class="dropdown-list-container">
                        <li class="dropdown-list">
                            <a href="#" dropdown-prop="title"> برترین محصولات <i class="dropdown-icon"></i></a>
                            <ul class="dropdown-list-items">
                                <label><input type="checkbox" name="checkbox" value="1">رنگ اول
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ دوم
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ سوم
                                </label><br>
                                <label><input type="checkbox" name="checkbox" value="1">رنگ چهارم
                                </label><br>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="col col-sm col-xs col-md col-lg col-xl-12 filter-price">
                    <!---->
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 filter-price-text">
                        <span>  قیمت   </span>
                    </div>
                    <div class="wrapper">
                        <fieldset class="filter-price">

                            <div class="price-field">
                                <input type="range"  min="100" max="500" value="100" id="lower">
                                <input type="range" min="100" max="500" value="500" id="upper">
                            </div>
                            <div class="price-wrap">
                                <div class="price-wrap-1">
                                    <input id="one">
                                    <label for="one">$</label>
                                </div>
                                <div class="price-wrap_line">-</div>
                                <div class="price-wrap-2">
                                    <input id="two">
                                    <label for="two">$</label>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <!---->
                </div>

                <div class="col col-sm col-xs col-md col-lg col-xl-12 adds-sidebar-1 delete-padding">
                    <img src="/img/sidbar/side1.png">
                </div>
                <div class="col col-sm col-xs col-md col-lg col-xl-12 adds-sidebar-2 delete-padding">
                    <img src="/img/sidbar/side2.png">
                </div>

            </div>
            <!--end-sidebar-->
            <div class="col col-sm-8 col-xs col-md-9 col-lg-9 col-xl-9 product-page-left">
                <div v-if="ok === 1" class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider delete-padding">
                    <!--slide-1-->
                    <div v-for="item in products" v-bind:key="item.id" class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex table-responsive-md table-responsive-lg table-responsive-xl">

                        <div v-for="product in item"  class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                            <a >
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                    <a :href="'/single/' + product.id"><img :src="'/images/products/' + product.images[0]"></a>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                            <span class="text-black title-4">  {{ product.title }}  </span>
                                        </div>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                        <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                            <a v-if="product.number" @click="sent_to_card(product)"><i class="fas fa-shopping-basket"></i></a>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                                <span class="price-none text-black title-4" v-if="product.price !== product.final_price">{{product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}</span>
                                                <span class="box-offer" v-if="product.discount !== 1"> %{{Math.round((1 - product.discount) * 100)}} </span>
                                            </div>
                                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                                <span class="">  {{product.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}<span class=""> تومان  </span> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--end-slide-1-->

                    <!--pagination-->
                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 pagination-admin">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item" v-bind:class="[{disabled: !pagination.prev}]"><a class="page-link" @click="fetchProducts(pagination.prev)">قبلی</a></li>
                                <li class="page-item"><a class="page-link" >{{pagination.current}} از {{pagination.last}}</a></li>
                                <li class="page-item" v-bind:class="[{disabled: !pagination.next}]"><a class="page-link" @click="fetchProducts(pagination.next)">بعدی</a></li>
                            </ul>
                        </nav>
                    </div>


                </div>
                <div style="font-family: irs; font-size: 12px" v-if="ok === 0" class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider delete-padding">
                    <b-alert show variant="danger" class="right-error">محصولی یافت نشد</b-alert>
                </div>
                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 adds-box delete-padding">
                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 adds-box-inside delete-padding">
                        <img src="/img/rezin-all/backadds.png">
                    </div>
                </div>
                <!--slide-4-->
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex margin-top-big table-responsive-md table-responsive-lg table-responsive-xl">

                    <div v-for="item in latest" class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                        <a  >
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                <a :href="'/single/' + item.id"><img :src="'/images/products/' + item.images[0]"></a>
                            </div>
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4"> {{item.title}}  </span>
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                    <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                        <a v-if="item.number" @click="sent_to_card(item)"><i class="fas fa-shopping-basket"></i></a>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                            <span class="price-none text-black title-4" v-if="item.price !== item.final_price">{{item.price}}</span>
                                            <span class="box-offer" v-if="item.discount !== 1"> %{{Math.round((1 - item.discount) * 100)}} </span>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                            <span class="">  {{item.final_price}} <span class=""> تومان  </span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <!--end-slide-4-->
            </div>

            <!--end-product-main-->

        </div>
        <!---->
        <!--end-body-->
    </div>
</template>

<script>
    export default {
        name: "products" ,

        props: ['main_categories'] ,

        data() {
            return {
                main_id: '' ,
                secondary_cats: [] ,
                products: [] ,
                ok: '' ,
                param: 'newest' ,
                pagination: [] ,
                searchflag: 0 ,
                latest: []
            }
        } ,


        watch: {
           '$route' (to , from) {
               if (to.params.id)
               {
                   this.productsByCat(to.params.id , this.param);
               }

               else if (to.params.title)
               {

                   this.search(to.params.title , this.param);
               }

               else
               {
                   this.productsBySec(to.params.main, to.params.sec, this.param);
                   // this.findBrands(this.$route.params.main);
               }
           }
        } ,



        created() {
            this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));

            if (this.$route.params.id)
            {
                this.productsByCat(this.$route.params.id , this.param);
            }

            else if (this.$route.params.title)
            {
                this.search(this.$route.params.title , this.param);
            }

            else
            {
                this.productsBySec(this.$route.params.main, this.$route.params.sec, this.param);
            }

            this.latest_products();
        } ,

        methods: {
            latest_products() {
                axios({
                    url: '/api/latest_products/4' ,
                    method: 'get' ,

                })
                    .then(res => {
                        console.log(res);
                        this.latest = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            sent_to_card(product) {
                this.$toasted.show('محصول اضافه شد', {
                    position: 'bottom-center' ,
                    type: 'success' ,
                    theme: 'bubble' ,
                    fitToScreen: true ,
                    className: ['your-custom-class']
                }).goAway(1500);
                let arr = JSON.parse(localStorage.getItem('order')) || [];

                if (product.order_number)
                {
                    product.order_number ++;
                    product.final_price1 = product.final_price * product.order_number;
                }
                else
                {
                    product.order_number = 1;
                    product.final_price1 = product.final_price * product.order_number;
                }

                let flag = 0;
                arr.forEach(item => {
                    if (item.id === product.id)
                    {
                        flag = 1;
                        if (item.order_number)
                        {
                            item.order_number ++;
                            item.final_price1 = item.final_price * item.order_number;
                        }
                        else
                        {
                            item.order_number = 1;
                            item.final_price1 = item.final_price * item.order_number;
                        }
                    }
                });

                if (flag === 0)
                {
                    arr.push(product);
                }


                localStorage.setItem('order' , JSON.stringify(arr));
                this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));
            } ,
            makePagination(obj) {
                this.pagination = {
                    next: obj.next_page_url,
                    last: obj.last_page,
                    prev: obj.prev_page_url,
                    current: obj.current_page
                };
            } ,

            fetchProducts(url) {
                if (this.searchflag)
                {
                    axios({
                        url: `${url}` ,
                        method: 'post' ,
                        data: {
                            title: this.$route.params.title
                        }
                    })
                        .then(res => {
                            this.ok = 1;
                            console.log(res);
                            this.orderedProducts(res.data.data);
                            this.makePagination(res.data);
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.ok = 0;
                            this.products = [];
                            this.pro = [];
                        })
                }
                else
                {
                    axios({
                        url: `${url}` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            this.ok = 1;
                            console.log(res);
                            this.orderedProducts(res.data.data);
                            this.makePagination(res.data);
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.ok = 0;
                            this.products = [];
                            this.pro = [];
                        })
                }

            } ,
            orderedProducts(obj) {
               let arr = [];
               this.products = [];

               for (let i = 0, k = 0; i < Math.ceil(obj.length / 4); i++ , k += 4)
               {
                   arr = [];
                   for (let j = k; j < k + 4 ; j++)
                   {

                        if (obj[j])
                        {
                            arr.push(obj[j]);
                            this.products[i] = arr;
                        }
                   }
               }
               console.log(this.products)
            } ,

            productsBySec(main , sec , param) {
                this.searchflag = 0;
                axios({
                    url: `/api/filters/category/${main}/${sec}/${param}` ,
                    method: 'get' ,
                })
                    .then(res => {
                        this.ok = 1;
                        console.log(res);
                        this.orderedProducts(res.data.data);
                        this.makePagination(res.data);
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.products = [];
                        this.pro = [];
                    })
            } ,
            search(title , param) {
                this.searchflag = 1;
                axios({
                    url: `/api/search/${param}` ,
                    method: 'post' ,
                    data: {
                        title: title
                    }
                })
                    .then(res => {
                        this.ok = 1;
                        console.log(res);
                        this.orderedProducts(res.data.data);
                        this.makePagination(res.data);
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.products = [];
                        this.pro = [];
                    })
            },
            productsByCat(id , param) {
                this.searchflag = 0;
                axios({
                    url: `/api/filters/category/${id}/${param}` ,
                    method: 'get' ,
                })
                    .then(res => {
                        this.ok = 1;
                        console.log(res);
                        this.orderedProducts(res.data.data);
                        this.makePagination(res.data);
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.products = [];
                        this.pro = [];
                    });
            } ,
        } ,
    }
</script>

<style scoped>
.right-error {
    float: right;
}
</style>