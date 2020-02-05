<template>
    <div class="col col-sm col-xs col-md col-lg col-xl-12 slider-product-end">
        <div class="col col-sm col-xs col-md col-lg col-xl-12 slider-product-end-top">
            <span class="text-black"> آخرین محصولات  </span>
        </div>
        <div class="col col-sm col-xs col-md col-lg col-xl-12 slider-product-end-bottom">
            <!---->
            <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-page-left-slider-inside flex table-responsive-md table-responsive-lg table-responsive-xl">

                <div v-for="item in products" class="col col-sm col-xs col-md- col-lg- col-xl-2 product-page-left-slider-inside-box delete-padding">
                    <a :href="'/single/' + item.id">
                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-top">
                            <img :src="'/images/products/' + item.images[0]">
                        </div>
                    </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom delete-padding"><a href="#">
                    <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top delete-padding">
                        <div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-top-subject">
                            <span class="text-black title-4">  {{item.title}}  </span>
                        </div>
                    </div>
                </a><div class="col col-sm col-xs col-md- col-lg- col-xl-12 product-page-left-slider-inside-box-bottom-bottom flex delete-padding"><a href="#">
                </a><div class="col-3 col-sm-3 col-xs col-md- col-lg- col-xl-3 product-page-left-slider-inside-box-bottom-bottom-buy"><a href="#">
                </a><a v-if="item.number !== 0"><i class="fas fa-shopping-basket"></i></a>
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
            <!---->
        </div>
    </div>
</template>

<script>
    export default {
        name: "single-newest-products" ,
        props: ['products']
    }
</script>

<style scoped>

</style>