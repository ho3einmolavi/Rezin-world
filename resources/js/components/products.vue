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
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-right-main-four delete-padding">
                    <ul class="dropdown-list-container">
                        <li class="dropdown-list">
                            <a href="#" dropdown-prop="title">محصولات تایید شده <i class="dropdown-icon"></i></a>
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
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-right-main-four delete-padding">
                    <ul class="dropdown-list-container">
                        <li class="dropdown-list">
                            <a href="#" dropdown-prop="title">محصولات تایید شده <i class="dropdown-icon"></i></a>
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
                                <!--<span class="price-title">FILTER</span>-->
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
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider delete-padding">
                    <!--slide-1-->
                    <div v-for="item in products" v-bind:key="item.id" class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex table-responsive-md table-responsive-lg table-responsive-xl">

                        <div v-for="product in item" class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                            <a href="#">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                    <img :src="'/images/products/' + product.product_img">
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                            <span class="text-black title-4">  {{ product.title }}  </span>
                                        </div>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                        <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                            <a href="#"><i class="fas fa-shopping-basket"></i></a>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                                <span class="price-none text-black title-4">{{product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}</span>
                                                <span class="box-offer"> %{{(1 - product.discount) * 100}} </span>
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

                    <div class="col-xs col-sm col-12 col-md col-lg col-xl-12 pagination delete-padding-right z-index">
                        <ul>
                            <li class="previous"><a href="#fakelink" class="fas fa-chevron-left"></a></li>
                            <li class="active"><a href="#fakelink">1</a></li>
                            <li class=""><a href="#fakelink">2</a></li>
                            <li class=""><a href="#fakelink">3</a></li>
                            <li class=""><a href="#fakelink">4</a></li>
                            <li class=""><a href="#fakelink">5</a></li>
                            <li class=""><a href="#fakelink">6</a></li>
                            <li class=""><a href="#fakelink">7</a></li>
                            <li class=""><a href="#fakelink">8</a></li>
                            <li class="next"><a href="#fakelink" class="fas fa-chevron-right"></a></li>
                        </ul>
                    </div>

                </div>
                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 adds-box delete-padding">
                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 adds-box-inside delete-padding">
                        <img src="/img/rezin-all/backadds.png">
                    </div>
                </div>
                <!--slide-4-->
                <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex margin-top-big table-responsive-md table-responsive-lg table-responsive-xl">

                    <div class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                        <a href="#">
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                <img src="/img/page-product/img1.png">
                            </div>
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4">  برنج آوازه مشهد  </span>
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                    <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                        <a href="#"><i class="fas fa-shopping-basket"></i></a>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                            <span class="price-none text-black title-4">250/000</span>
                                            <span class="box-offer"> %10 </span>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                            <span class="">  215/000 <span class=""> تومان  </span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                        <a href="#">
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                <img src="img/page-product/img1.png">
                            </div>
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4">  برنج آوازه مشهد  </span>
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                    <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                        <a href="#"><i class="fas fa-shopping-basket"></i></a>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                            <span class="price-none text-black title-4">250/000</span>
                                            <span class="box-offer"> %10 </span>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                            <span class="">  215/000 <span class=""> تومان  </span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                        <a href="#">
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                <img src="img/page-product/img1.png">
                            </div>
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4">  برنج آوازه مشهد  </span>
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                    <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                        <a href="#"><i class="fas fa-shopping-basket"></i></a>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                            <span class="price-none text-black title-4">250/000</span>
                                            <span class="box-offer"> %10 </span>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                            <span class="">  215/000 <span class=""> تومان  </span> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col col-sm col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box delete-padding">
                        <a href="#">
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                <img src="img/page-product/img1.png">
                            </div>
                            <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4">  برنج آوازه مشهد  </span>
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding">
                                    <div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                        <a href="#"><i class="fas fa-shopping-basket"></i></a>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                            <span class="price-none text-black title-4">250/000</span>
                                            <span class="box-offer"> %10 </span>
                                        </div>
                                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                            <span class="">  215/000 <span class=""> تومان  </span> </span>
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
                param: 'newest'
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
                   this.productsBySec(to.params.main, this.$route.params.sec, this.param);
                   // this.findBrands(this.$route.params.main);
               }
           }
        } ,



        created() {

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
               // this.findBrands(this.$route.params.main);
            }
        } ,

        methods: {
            productsBySec(main , sec , param) {
                axios({
                    url: `/api/filters/category/${main}/${sec}/${param}` ,
                    method: 'get' ,
                })
                    .then(res => {
                        this.ok = 1;
                        console.log(res);
                        this.products = res.data;

                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.products = [];
                        this.pro = [];
                    })
            } ,
            search(title , param) {
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
                        this.products = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                        this.products = [];
                        this.pro = [];
                    })
            },
            productsByCat(id , param) {
                axios({
                    url: `/api/filters/category/${id}/${param}` ,
                    method: 'get' ,
                })
                    .then(res => {
                        this.ok = 1;
                        console.log(res);
                        this.products = res.data;
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

</style>