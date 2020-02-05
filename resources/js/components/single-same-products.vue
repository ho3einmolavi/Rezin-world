<template>
    <div class="col col-sm col-xs col-md col-lg col-xl-12 slider-product">
        <div class="col col-sm col-xs col-md col-lg col-xl-12 slider-product-top">
            <span class="text-black"> محصولات مشابه </span>
        </div>
        <div class="col col-sm col-xs col-md col-lg col-xl-12 slider-product-bottom">
            <!--slideshow-->
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <div class="container carousel-inner no-padding">
                    <div class="carousel-item active">
                        <div   class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex table-responsive-md table-responsive-lg table-responsive-xl">

                            <div v-for="item in products[0]" class="col col-sm col-xs col-md- col-lg- col-xl-2 product-page-left-slider-inside-box delete-padding">
                                <a :href="'/single/' + item.id">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                        <img :src="'/images/products/' +item.images[0]">
                                    </div>
                                </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding"><a href="#">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4"> {{item.title}}  </span>
                                    </div>
                                </div>
                            </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding"><a href="#">
                            </a><div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy"><a href="#">
                            </a><a href="#"><i class="fas fa-shopping-basket"></i></a>
                            </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                        <span v-if="item.price !== item.final_price" class="price-none text-black title-4">{{item.price}}</span>
                                        <span class="box-offer" v-if="item.discount !== 1">  %{{Math.round((1 - item.discount) * 100)}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                        <span class="">  {{item.final_price}} <span class=""> تومان  </span> </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            </div>

                        </div>

                    </div>
                    <div class="carousel-item">
                        <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex table-responsive-md table-responsive-lg table-responsive-xl">

                            <div v-for="item in products[1]" class="col col-sm col-xs col-md- col-lg- col-xl-2 product-page-left-slider-inside-box delete-padding">
                                <a :href="'/single/' + item.id">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                        <img :src="'/images/products/' +item.images[0]">
                                    </div>
                                </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding"><a href="#">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4"> {{item.title}}  </span>
                                    </div>
                                </div>
                            </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding"><a href="#">
                            </a><div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy"><a href="#">
                            </a><a href="#"><i class="fas fa-shopping-basket"></i></a>
                            </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                        <span v-if="item.price !== item.final_price" class="price-none text-black title-4">{{item.price}}</span>
                                        <span class="box-offer" v-if="item.discount !== 1">  %{{Math.round((1 - item.discount) * 100)}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                        <span class="">  {{item.final_price}} <span class=""> تومان  </span> </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            </div>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex table-responsive-md table-responsive-lg table-responsive-xl">

                            <div v-for="item in products[2]" class="col col-sm col-xs col-md- col-lg- col-xl-2 product-page-left-slider-inside-box delete-padding">
                                <a :href="'/single/' + item.id">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                                        <img :src="'/images/products/' +item.images[0]">
                                    </div>
                                </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding"><a href="#">
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                                        <span class="text-black title-4"> {{item.title}}  </span>
                                    </div>
                                </div>
                            </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding"><a href="#">
                            </a>
                                <div v-if="item.number !== 0" class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy">
                                    <a>
                                    <i class="fas fa-shopping-basket"></i>
                                    </a>
                                </div>
                                <div class="col col-sm col-xs col-md- col-lg- col-xl-9 product-page-left-slider-inside-box-bottom-bottom-price delete-padding">
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-off">
                                        <span v-if="item.price !== item.final_price" class="price-none text-black title-4">{{item.price}}</span>
                                        <span class="box-offer" v-if="item.discount !== 1">  %{{Math.round((1 - item.discount) * 100)}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom-price-none">
                                        <span class="">  {{item.final_price}} <span class=""> تومان  </span> </span>
                                    </div>
                                </div>
                            </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <!-- partial -->
            <!--end-slideshow-->
        </div>


    </div>
</template>

<script>
    export default {
        name: "single-same-products" ,

        created() {
            this.get_same_products(this.$route.params.productID)
        } ,

        data() {
            return {
                products: [] ,
                latestProducts: [] ,
            }
        } ,

        methods: {
            chunk(array, size) {
                const chunked_arr = [];
                let copied = [...array]; // ES6 destructuring
                const numOfChild = Math.ceil(copied.length / size); // Round up to the nearest integer
                for (let i = 0; i < numOfChild; i++) {
                    chunked_arr.push(copied.splice(0, size));
                }
                return chunked_arr;
            } ,
            get_same_products(id) {
                axios({
                    url: `/api/sameProducts/${id}` ,
                    method: 'get' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.products = this.chunk(res.data.same , 6);
                        this.latestProducts = res.data.latest;
                        this.$emit('newest-products' , this.latestProducts);
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        }
    }
</script>

<style scoped>

</style>