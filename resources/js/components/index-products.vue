<template>
    <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-all delete-padding">
        <!--product-rezin-->
        <center>
            <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin">
                <div class="col col-sm col-md-12 col-lg col-xl-12 product-rezin-inside-des flex">
                    <div class="col col-sm col-xs col-md-6 col-lg-6 col-xl-6 product-rezin-inside-des-right delete-padding flex">

                        <div v-for="item in products[0]" class="col col-sm col-xs col-md col-lg col-xl-4 product-rezin-inside delete-padding">
                            <a :href="'/single/' + item.id">
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-inside-top">
                                    <img :src="'/images/products/' + item.images[0]">
                                </div>
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-inside-between delete-padding">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-roat">
                                        <div class="stars" data-stars="1">
                                            <svg height="20" width="18" class="star rating" data-rating="1">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"></polygon>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="2">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"></polygon>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="3">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"></polygon>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="4">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"></polygon>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="5">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"></polygon>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-name">
                                        <span class="title-4 text-black"> {{item.title}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-model">
                                        <span class="title-4 text-black"> مدل : transparent </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-cod">
                                        <span class="title-4 text-black"> کد BGRG04 حجم 60 میلی لیتر  </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-number">
                                        <span class="title-4 text-black">(بسته 4 عددی) </span>
                                    </div>
                                </div>
                                <hr class="hr-product-top">
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-inside-bottom flex delete-padding">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-4 product-price-right">
                                        <span class="title-4" v-if="item.price !== item.final_price"> {{item.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-8 product-price-left">
                                        <span class="title-4 bold text-black"> {{item.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} <span class="title-4" style="font-weight: normal;"> تومان</span></span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="col col-sm col-xs col-md-6 col-lg-6 col-xl-6 product-rezin-inside-des-left delete-padding flex">

                        <div v-for="item in products[1]" class="col col-sm col-xs col-md col-lg col-xl-4 product-rezin-inside delete-padding">
                            <a :href="'/single/' + item.id">
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-inside-top">
                                    <img :src="'/images/products/' + item.images[0]">
                                </div>
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-inside-between delete-padding">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-roat">
                                        <div class="stars" data-stars="1">
                                            <svg height="20" width="18" class="star rating" data-rating="1">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="2">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="3">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="4">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                                            </svg>
                                            <svg height="20" width="18" class="star rating" data-rating="5">
                                                <polygon points="9.9, 1.1, 3.3, 21.78, 19.8, 8.58, 0, 8.58, 16.5, 21.78" style="fill-rule:nonzero;"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-name">
                                        <span class="title-4 text-black"> {{item.title}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-model">
                                        <span class="title-4 text-black"> مدل : transparent </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-cod">
                                        <span class="title-4 text-black"> کد BGRG04 حجم 60 میلی لیتر  </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 rezin-number">
                                        <span class="title-4 text-black">(بسته 4 عددی) </span>
                                    </div>
                                </div>
                                <hr class="hr-product-top">
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-inside-bottom flex delete-padding">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-4 product-price-right">
                                        <span class="title-4" v-if="item.price !== item.final_price"> {{item.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-8 product-price-left">
                                        <span class="title-4 bold text-black">{{item.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} <span class="title-4" style="font-weight: normal;"> تومان</span></span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </center>
        <!--end-product-rezin-->
        <!--product-rezin-end-->
        <div class="col col-sm col-xs col-md col-lg col-xl-12 product-rezin-end" alt="Responsive image">
            <center>
                <div class="col col-sm col-xs col-md-6 col-lg col-xl-3 product-rezin-end-main-top">
                    <span>  رزین یکی از بهترین مارکا های ایرانی در زمینه رنگ می باشد. و با بهره گیری از مدیران با تجربه در این زمینه فعالیت می کند   رزین یکی از بهترین مارکا های ایرانی در زمینه رنگ می باشد. و با بهره گیری از مدیران با تجربه در این زمینه فعالیت می کند </span>
                </div>
                <div class="col col-sm col-xs col-md-6 col-lg col-xl-3 product-rezin-end-main-input">
                    <a href="#"><div class="bigg">
                        <span> بیشتر  </span>
                    </div></a>
                </div>
            </center>
        </div>
        <!--end-product-rezin-end-->
    </div>
</template>

<script>
    export default {
        name: "index-products" ,
        created() {
            this.get_products();
        } ,

        data() {
            return {
                products: []
            }
        } ,

        methods: {
            get_products() {
                axios({
                    url: `/api/latest_products/4` ,
                    method: 'get' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.products = this.chunk(res.data , 2);
                        console.log(this.products)
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            chunk(array, size) {
                const chunked_arr = [];
                let copied = [...array]; // ES6 destructuring
                const numOfChild = Math.ceil(copied.length / size); // Round up to the nearest integer
                for (let i = 0; i < numOfChild; i++) {
                    chunked_arr.push(copied.splice(0, size));
                }
                return chunked_arr;
            } ,

        }
    }
</script>

<style scoped>

</style>