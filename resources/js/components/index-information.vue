<template>
    <!--information-rezin-main-->
    <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main">
        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-top">
            <span>  رزین ولد برای همه </span>
        </div>

        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom">
            <center>
                <div class="ol col-sm col-xs col-md col-lg col-xl-10 col-information-rezin-main-bottom-auto flex">
                    <div class="col col-sm col-xs col-md-3 col-lg-3 col-xl-3 information-rezin-main-bottom-inside">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-img">
                            <img src="img/rezin-all/p-1.png">
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-subject">
                            <span class="text-black title-4 bold">   جوهر رنگ زرین اپوکسی   </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-info">
                            <span class="text-black title-4"> رزین یکی از بهترین مارکا های ایرانی در زمینه رنگ می باشد. و با بهره گیری از مدیران با تجربه در این زمینه فعالیت می کند   </span>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md-3 col-lg-3 col-xl-3 information-rezin-main-bottom-inside">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-img">
                            <img src="img/rezin-all/p-2.png">
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-subject">
                            <span class="text-black title-4 bold">   جوهر رنگ زرین اپوکسی   </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-info">
                            <span class="text-black title-4"> رزین یکی از بهترین مارکا های ایرانی در زمینه رنگ می باشد. و با بهره گیری از مدیران با تجربه در این زمینه فعالیت می کند   </span>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md-3 col-lg-3 col-xl-3 information-rezin-main-bottom-inside">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-img">
                            <img src="img/rezin-all/p-3.png">
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-subject">
                            <span class="text-black title-4 bold">   جوهر رنگ زرین اپوکسی   </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-info">
                            <span class="text-black title-4"> رزین یکی از بهترین مارکا های ایرانی در زمینه رنگ می باشد. و با بهره گیری از مدیران با تجربه در این زمینه فعالیت می کند   </span>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md-3 col-lg-3 col-xl-3 information-rezin-main-bottom-inside">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-img">
                            <img src="img/rezin-all/p-4.png">
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-subject">
                            <span class="text-black title-4 bold">   جوهر رنگ زرین اپوکسی   </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-main-bottom-inside-info">
                            <span class="text-black title-4"> رزین یکی از بهترین مارکا های ایرانی در زمینه رنگ می باشد. و با بهره گیری از مدیران با تجربه در این زمینه فعالیت می کند   </span>
                        </div>
                    </div>
                </div>
            </center>
        </div>

        <!--end-information-rezin-main-->

        <!--information-rezin-news-->
        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-news">
            <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-news-top">
                <span> اخبار و مقالات رزین ولد </span>
            </div>
            <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-news-bottom">
                <center>
                    <div class="col col-sm col-xs col-md col-lg col-xl-11 col-information-rezin-news-bottom-auto flex delete-padding">
                        <div v-for="article in articles" class="col col-sm col-xs col-md-6 col-lg-6 col-xl-6 article-info-right flex">


                            <div v-for="item in article" class="col col-sm col-xs col-md col-lg col-xl-6 article-info-1 delete-padding" style="margin-right: 15px">
                                <a :href="'/article/' + item.title">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 article-info-top delete-padding">
                                        <img :src="'/images/articles/' + item.cover">
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 img-article-small">
                                        <!--<img src="/img/rezin-all/img-article.png">-->
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 article-info-bottom delete-padding">
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 article-info-bottom-subject">
                                            <span class="title-3 text-black-black">{{item.title}}  </span>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 article-info-bottom-des">
                                            <p class="text-black title-4">{{item.body.substr(0 , 150) + "..."}}</p>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 article-info-bottom-end flex delete-padding">
                                            <div class="col col-sm col-xs col-md col-lg col-xl-6 article-info-bottom-end-right">
                                                <span class="text-black title-4"> {{item.date}}  </span>
                                            </div>
                                            <div class="col col-sm col-xs col-md col-lg col-xl-6 article-info-bottom-end-left">
                                                <span  class="text-black title-4"> 124 </span>
                                                <span><i class="far fa-comment-alt"></i> </span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                        </div>

                    </div>
                </center>
            </div>
        </div>
        <!--end-iinformation-rezin-news-->

        <!--information-rezin-customer-->
        <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-customer">
            <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-customer-top">
                <span> نظرات مشتریان رزین ولد </span>
            </div>
            <div class="col col-sm col-xs col-md col-lg col-xl-12 information-rezin-customer-bottom">
                <!-- partial:index.partial.html -->
                <div class="carousel-main">
                    <ul class="carousel">

                        <li class="li-main items main-pos" id="1">
                            <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one">
                                <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-top">
                                    <div class="custome-box-one-top-img">
                                        <img src="img/comments/user-1.png">
                                    </div>
                                </div>
                                <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-between">
                                    <p class="text-black">هم چنین تاجران مشتاق بسیاری وجود دارند که آماده به چالش پرداختن با تجارت آنلاین خود می باشند. این واقعیت در ارتباط با شرایط شما نیز می باشد. مهارت ها و افراد بی شماری وجود دارند که سعی می کنند تا به بهترین نحو تلاش نمایند تا تجارت خود را پایدار بسازند، اما آن ها مواردی را در اختیار ندارند تا این امر را بر همگان آشکار نمایند.</p>
                                </div>
                                <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-end">
                                    <div class="custome-box-one-end-span">
                                        <span> میترا محمدبیگی </span>
                                    </div>
                                </div>
                            </div>
                        </li>



                        <li class="li-main items right-pos" id="2">
                            <div class="custome-box-two">
                                <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one">
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-top">
                                        <div class="custome-box-one-top-img">
                                            <img src="img/comments/user-1.png">
                                        </div>
                                    </div>
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-between">
                                        <p class="text-black">هم چنین تاجران مشتاق بسیاری وجود دارند که آماده به چالش پرداختن با تجارت آنلاین خود می باشند. این واقعیت در ارتباط با شرایط شما نیز می باشد. مهارت ها و افراد بی شماری وجود دارند که سعی می کنند تا به بهترین نحو تلاش نمایند تا تجارت خود را پایدار بسازند، اما آن ها مواردی را در اختیار ندارند تا این امر را بر همگان آشکار نمایند.</p>
                                    </div>
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-end">
                                        <div class="custome-box-one-end-span">
                                            <span> میترا محمدبیگی </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                        <li class="li-main items back-pos" id="3">
                            <div class="custome-box-three">
                                <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one">
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-top">
                                        <div class="custome-box-one-top-img">
                                            <img src="img/comments/user-1.png">
                                        </div>
                                    </div>
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-between">
                                        <p class="text-black">هم چنین تاجران مشتاق بسیاری وجود دارند که آماده به چالش پرداختن با تجارت آنلاین خود می باشند. این واقعیت در ارتباط با شرایط شما نیز می باشد. مهارت ها و افراد بی شماری وجود دارند که سعی می کنند تا به بهترین نحو تلاش نمایند تا تجارت خود را پایدار بسازند، اما آن ها مواردی را در اختیار ندارند تا این امر را بر همگان آشکار نمایند.</p>
                                    </div>
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-end">
                                        <div class="custome-box-one-end-span">
                                            <span> میترا محمدبیگی </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="li-main items left-pos" id="4">
                            <div class="custome-box-four">
                                <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one">
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-top">
                                        <div class="custome-box-one-top-img">
                                            <img src="img/comments/user-1.png">
                                        </div>
                                    </div>
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-between">
                                        <p class="text-black">هم چنین تاجران مشتاق بسیاری وجود دارند که آماده به چالش پرداختن با تجارت آنلاین خود می باشند. این واقعیت در ارتباط با شرایط شما نیز می باشد. مهارت ها و افراد بی شماری وجود دارند که سعی می کنند تا به بهترین نحو تلاش نمایند تا تجارت خود را پایدار بسازند، اما آن ها مواردی را در اختیار ندارند تا این امر را بر همگان آشکار نمایند.</p>
                                    </div>
                                    <div class="col col-xs col-sm col-md col-lg col-xl-12 custome-box-one-end">
                                        <div class="custome-box-one-end-span">
                                            <span>    میترا محمدبیگی   </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                    <!--
                  <span class="custome-input">
                      <i class="fas fa-angle-left" id="prev"></i>
                    <i class="fas fa-angle-right" id="next"></i>
                  </span>-->
                </div>
                <!-- partial -->
            </div>
        </div>
        <!--end-information-rezin-customer-->
        <!--customer-->
        <div class="col col-sm col-xs col-md col-lg col-xl-12 customer-us">
        </div>
        <!--end-customer-->


        <!--end-body--></div><!---->
</template>

<script>
    export default {
        name: "index-information" ,

        data() {
            return {
                articles: [] ,
                comments: []
            }
        } ,

        created() {
            this.get_articles();
           // this.get_comments();
        } ,

        methods: {
            get_comments() {
                axios({
                    method: 'get' ,
                    url: '/api/articlesForShow'
                })
                    .then(res => {
                        console.log(res);
                        this.comments = res.data;
                    })
                    .catch(err => console.log(err.response))
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
            get_articles() {
                axios({
                    method: 'get' ,
                    url: '/api/articlesForShow'
                })
                    .then(res => {
                        console.log(res);
                        this.articles = this.chunk(res.data , 2);
                    })
                    .catch(err => console.log(err.response))
            }
        }
    }
</script>

<style scoped>

</style>