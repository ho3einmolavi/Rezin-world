<template>
    <div class="col col-sm col-xs col-md col-lg col-xl-12 body-main delete-padding">
        <div class="col col-sm col-xs col-md-12 col-lg-12 col-xl-12 product-main-Location flex">
            <span class="title-4 text-black"> صفحه اصلی  </span>
            <span class="text-black"><i class="fas fa-angle-left"></i></span>
            <span class="title-4 text-black"> محصولات </span>
        </div>
        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main flex">
            <div class="col col-sm col-xs col-md-4 col-lg-4 col-xl-4 card-main-right">
                <!--<div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-right-like">-->
                    <!--<span>  265 </span>-->
                    <!--<span><i class="fas fa-heart"></i></span>-->
                <!--</div>-->
                <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-right-img">
                    <div class="card-main-right-img-inside">
                        <!--gallery-->
                        <div v-for="(img , index) in product.images" class="mySlides" style="width: 345px;">
                            <div class="numbertext">{{index + 1}} / {{product.images.length}}</div>
                            <img :src="'/images/products/' + img">
                        </div>

                        <a class="prev" onclick="plusSlides(-1)">❮</a>
                        <a class="next" onclick="plusSlides(1)">❯</a>


                        <div class="row images-inside">
                            <div v-for="(img , index) in product.images" class="column">
                                <img class="demo cursor" :src="'/images/products/' + img" @click="currentSlide(index + 1)" alt="The Woods">
                            </div>

                        </div>
                        <!--end-gallery-->
                    </div>
                </div>
            </div>
            <div class="col col-sm col-xs col-md-8 col-lg-8 col-xl-8 card-main-left">
                <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-subject flex">
                    <div class="col col-sm col-xs col-md col-lg col-xl-8 card-main-left-subject-right">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-subject-right-top">
                            <span class="title-2"> {{product.title}}  </span>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md col-lg col-xl-4 card-main-left-subject-left">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-subject-left-top">
                            <div class="stars" data-stars="5">
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
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-subject-left-bottom">
                            <!--<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share">Share via Whatsapp</a>-->
                            <a @click="shareLinkOnWhatsapp" ><span class="share text-black"><i class="fas fa-share-alt"></i></span></a>
                            <span style="cursor: pointer;" class="title-4 text-black" @click="shareLinkOnWhatsapp">  اشتراک گذاری  </span>
                        </div>
                    </div>
                </div>

                <hr class="hr-page-card">
                <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-like">
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-like-top flex">
                        <div class="col col-sm col-xs col-md-4 col-lg-4 col-xl-4 card-main-left-like-top-right">
                            <span class="text-black title-4"> قیمت محصول </span>
                        </div>
                        <div class="col col-sm col-xs col-md-8 col-lg-8 col-xl-8 card-main-left-like-top-left">
                            <span class="text-black title-4"> تعداد محصول </span>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-like-between flex">
                        <div class="col col-sm col-xs col-md-4 col-lg col-xl-4 card-main-left-like-between-right">
                            <span> {{product.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} <span> تومان </span> </span>
                            <span class="offer-number"> {{product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}</span>
                        </div>
                        <div class="col col-sm col-xs col-md-8 col-lg col-xl-8 card-main-left-like-between-left flex">
                            <div class="col col-sm col-xs col-md col-lg col-xl-3 card-main-left-like-between-left-number">
                                <!---->
                                <div class="wrapper">
                                    <div class="control" id="minus" @click="reducePro(product)">-</div>
                                    <div id="number" v-if="order" >{{order.order_number}}</div>
                                    <div id="number" v-else> 0 </div>
                                    <div class="control" id="plus" @click="increasePrd(product)">+</div>
                                </div>
                                <!---->
                            </div>
                            <!--<div class="col col-sm col-xs col-md col-lg col-xl-2 card-main-left-like-between-left-like">-->
                                <!--<div class="like-icon">-->
                                    <!--<i class="far fa-heart"></i>-->
                                <!--</div>-->
                            <!--</div>-->

                            <div @click="increasePrd(product)" style="cursor: pointer" class="col col-sm col-xs col-md col-lg col-xl-7 card-main-left-like-between-left-buy">
                                <div class="buy-icon">
                                    <a><span  class="title-4"> افزودن به سبد خرید </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-like-end">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-like-end-inside">
                            <span class="text-black"><i class="fas fa-calendar-alt"></i></span>
                            <span class="text-black title-4"> 1398/12/03 </span>
                        </div>
                    </div>

                    <!--res-->
                    <div class="col col-sm col-xs col-md col-lg col-xl-7 card-main-left-like-between-left-buy-res">
                        <div class="buy-icon-res">
                            <a href="/card/products"><span class="title-4"> لینک خرید محصول </span></a>
                        </div>
                        <div></div></div>
                    <!--end-res-->

                </div>
                <hr class="hr-page-card">
                <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des flex">
                    <div class="col col-sm col-xs col-md col-lg col-xl-3 card-main-left-des-right">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-right-inside">
                            <span class="text-black title-4"> رنگ محصول </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-right-inside">
                            <span class="text-black title-4"> رنگ محصول </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-right-inside">
                            <span class="text-black title-4"> رنگ محصول </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-right-inside">
                            <span class="text-black title-4"> رنگ محصول </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-right-inside">
                            <span class="text-black title-4"> رنگ محصول </span>
                        </div>
                    </div>
                    <div class="col col-sm col-xs col-md col-lg col-xl-9 card-main-left-des-left">
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-left-inside">
                            <span class="text-black title-4"> خاکستری تیره  </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-left-inside">
                            <span class="text-black title-4"> خاکستری تیره  </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-left-inside">
                            <span class="text-black title-4"> خاکستری تیره  </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-left-inside">
                            <span class="text-black title-4"> خاکستری تیره  </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-12 card-main-left-des-left-inside">
                            <span class="text-black title-4"> خاکستری تیره  </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--tab-comment-->
        <div class="col col-sm col-xs col-md col-lg col-xl-12 tab-comment">
            <!-- partial:index.partial.html -->
            <!-- TAB CONTROLLERS -->
            <input id="panel-1-ctrl" class="panel-radios" type="radio" name="tab-radios" checked>
            <input id="panel-2-ctrl" class="panel-radios" type="radio" name="tab-radios">
            <input id="panel-3-ctrl" class="panel-radios" type="radio" name="tab-radios">


            <!-- TABS LIST -->
            <ul id="tabs-list">
                <!-- MENU TOGGLE -->
                <label id="open-nav-label" for="nav-ctrl"></label>
                <li id="li-for-panel-1">
                    <label class="panel-label" for="panel-1-ctrl">  مشخصات محصول  </label>
                </li>
               <li id="li-for-panel-2">
                    <label class="panel-label" for="panel-2-ctrl">  نظرات مشتریان  </label>
                </li>
                <li id="li-for-panel-3">
                    <label class="panel-label" for="panel-3-ctrl">   پرسش های عمومی  </label>
                </li>

                <label id="close-nav-label" for="nav-ctrl">Close</label>
            </ul>

            <!-- THE PANELS -->
            <article id="panels">
                <div class="container">

                    <section id="panel-1">
                            <main>
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product flex table-responsive-md table-responsive-lg table-responsive-xl">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-3 details-product-right">
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4"> رنگ برنج  </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4"> نوع برنج </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4">عنوان برنج </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4"> اندازه دانه</span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4">  اندازه دانه  </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4">وزن </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4"> توضیحات نوع برنج</span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-right-inside">
                                            <div class="details-text">
                                                <span class="text-black title-4">شماره پروانه بهداشت </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col col-sm col-xs col-md col-lg col-xl-9 details-product-left">
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4"> سفید  </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4"> ساده</span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4">هاشمی </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4"> دانه کامل  </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4"> 10 کیلوگرم  </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4">  5 تا 10 کیلوگرم </span></div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4">  برنج ایرانی هاشمی </span>
                                            </div>
                                        </div>
                                        <div class="col col-sm col-xs col-md col-lg col-xl-12 details-product-left-inside">
                                            <div class="details-text-des">
                                                <span class="text-black title-4">  8375706981 </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                        </section>


                    <section id="panel-2">
                        <main>
                            <div class="text-comment">
                                <form class="comment-inside" id="addComment">
                                    <textarea cols="90" name="body" v-model="body" id="body" form="usrform" placeholder="نظر خود را درباره این  محصول بنویسید ..." rows="2"></textarea>
                                    <button type="button" class="send-Comment" @click="addComment()">ارسال دیدگاه</button>
                                </form>
                            </div>




                            <div v-for="item in comments" class="col col-sm col-xs col-md col-lg col-xl-12 comment-customer flex margin-top-big">
                                <div class="col col-sm-3 col-xs col-md-3 col-lg-3 col-xl-2 comment-customer-right">
                                    <div class="customer-img">
                                        <img src="/img/comments/user-1.png">
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md col-lg col-xl-10 comment-customer-left">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 comment-customer-left-name">
                                        <span class="text-black title-4" v-if="item.user">{{item.user.first_name}} {{item.user.last_name}}  </span>
                                        <span class="text-black title-4" v-else>مهمان </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-12 comment-customer-left-des">
                                        <span class="text-black title-4"> {{item.body}}  </span>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </section>

                    <section id="panel-3">
                        <main>
                            <div class="col-xs col-sm col- col-md col-lg col-xl-12 content-faq">
                                <section class="col-xs col-sm col- col-md col-lg col-xl-10 faq">
                                    <div class="faq-items">
                                        <ul id="basics" class="faq-group">
                                            <li class="faq-title"><h2>پرسش های عمومی </h2></li>
                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه یک وکیل  ماهر انتخاب کنم؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه  </p>
                                                </div> <!-- faq-content -->
                                            </li>

                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه وکیل برای دعاوی کیفری پیدا کنیم؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه </p>
                                                </div> <!-- faq-content -->
                                            </li>

                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه میتوان آدرس وکلای ماهر را پیدا کرد</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه پ</p>
                                                </div> <!-- faq-content -->
                                            </li>

                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه میتوان وقت مشاوره گرفت؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه </p>
                                                </div> <!-- faq-content -->
                                            </li>
                                        </ul> <!-- faq-group -->





                                        <!-- faq-group -->

                                        <ul id="privacy" class="faq-group">
                                            <li class="faq-title"><h2>قوانین</h2></li>
                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه یک وکیل  ماهر انتخاب کنم؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه </p>
                                                </div> <!-- faq-content -->
                                            </li>

                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه یک وکیل  ماهر انتخاب کنم؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه </p>
                                                </div> <!-- faq-content -->
                                            </li>

                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه یک وکیل  ماهر انتخاب کنم؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه </p>
                                                </div> <!-- faq-content -->
                                            </li>

                                            <li>
                                                <a class="trigger colorgray" href="#0">چگونه یک وکیل  ماهر انتخاب کنم؟</a>
                                                <div class="faq-content">
                                                    <p>عازم کجا هستید؟ هیچ فرقی نمی‌کند. این حق شماست که سفری باکیفیت، آسان و مطمئن را تجربه کنید. علی‌بابا اینجاست تا تجربه‌ای شایسته از یک سفر به‌یادماندنی را ایجاد کند، تجربه‎‌ای که برازنده منزلت شما باشد. سفر باید آسان باشد، مطمئن و به‌صرفه؛ و همه اینها در علی‌بابا خلاصه شده است. از هر کجا به هر کجا، با هواپیما یا قطار، سیستمی یا چارتر، کاری یا تفریحی. سبد خدمات علی‌بابا کامل است و ما پاسخگوی همه نیازهای شما هستیم. علی‌بابا همسفر حرفه‌ای‌هاست، و این تجربه‌ی حرفه‌ای در همه مراحل سفر همراه شماست.از زمانی که قصد سفرکرده‌اید تا خرید بلیط تا پشتیبانی 24 ساعته توسط یک تیم 150 نفره، و حتی تا زمانی که برنامه‌هایتان تغییر کرده و قصد استرداد بلیطرا دارید. همه چیز با چند کلیک ساده اتفاق می‌افتد. علی‌بابا برندی از هلدینگ پرافتخار توشا (توسعه تجربه شایسته سفر) است، سامانه‌ای که به‌واسطه </p>
                                                </div> <!-- faq-content -->
                                            </li>
                                        </ul> <!-- faq-group -->

                                    </div> <!-- faq-items -->
                                    <a href="#0" class="cd-close-panel">Close</a>
                                </section>
                            </div>
                        </main>
                    </section>
                </div>
            </article>

        </div>
        <!-- partial -->
    </div>
</template>

<script>
    export default {
        name: "single-product-feature" ,

        created() {
            this.get_number_of_product();
            this.get_product(this.$route.params.productID);
            this.getComments(this.$route.params.productID);
        } ,


        data() {
            return {
                product: [] ,
                body: '' ,
                comments: [] ,
                order: null
            }
        } ,

        methods: {
            reducePro(product) {
                let arr = JSON.parse(localStorage.getItem('order')) || null;
                    arr.forEach(item => {
                        if (item.id === product.id)
                        {
                            if (item.order_number !== 1)
                            {
                                item.order_number --;
                                item.final_price1 = item.final_price * item.order_number;
                            }
                            else {
                                this.order = null;
                                let index = arr.indexOf(item);
                                if (index > -1)
                                {
                                    arr.splice(index, 1);
                                }
                            }
                        }
                    });



                localStorage.setItem('order' , JSON.stringify(arr));
                let order = JSON.parse(localStorage.getItem('order'));
                order.forEach(item => {
                    if (item.id == this.$route.params.productID)
                    {
                        this.order = item
                    }
                });
                this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));

            } ,
            increasePrd(product) {
                this.$toasted.show('محصول اضافه شد', {
                    position: 'bottom-center' ,
                    type: 'success' ,
                    theme: 'bubble' ,
                    fitToScreen: true ,
                    className: ['your-custom-class']
                }).goAway(1500);
                let flag = 0;
                let arr = JSON.parse(localStorage.getItem('order')) || null;
                if (arr)
                {
                    arr.forEach(item => {
                        if (item.id === product.id)
                        {
                            flag = 1;
                            item.order_number ++;
                            item.final_price1 = item.final_price * item.order_number;
                        }
                    });
                    if (flag === 0)
                    {
                        arr.push(product);
                        arr.forEach(item => {
                            item.order_number = 1;
                            item.final_price1 = item.final_price * item.order_number;
                        });
                    }
                }
                else
                {
                    arr = [];
                    arr.push(product);
                    arr.forEach(item => {
                            item.order_number = 1;
                            item.final_price1 = item.final_price * item.order_number;
                    });
                }

                localStorage.setItem('order' , JSON.stringify(arr));
                let order = JSON.parse(localStorage.getItem('order'));
                order.forEach(item => {
                    if (item.id == this.$route.params.productID)
                    {
                        this.order = item
                    }
                });

                this.$emit('send_number' , JSON.parse(localStorage.getItem('order')));

            } ,
            get_number_of_product() {
                let order = JSON.parse(localStorage.getItem('order')) || null;
                if (order)
                {
                    order.forEach(item => {
                        if (item.id == this.$route.params.productID)
                        {
                            this.order = item
                        }
                    });
                }
            } ,
            shareLinkOnWhatsapp() {
                window.location=`https://wa.me/?text=${window.location.href}`
            } ,
            getComments(id) {
                axios({
                    url: `/api/comments/${id}` ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.comments = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            addComment() {
                axios({
                    url: `/api/store/comment` ,
                    method: 'post' ,
                    data: {
                        body: this.body ,
                        product_id: this.$route.params.productID
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.$swal('نظر شما با موفقیت ثبت شد' , 'با تشکر' , 'success' ,
                            {
                                customClass: {
                                    title: 'title-font' ,
                                    text: 'text-font' ,
                                }
                            });
                        this.body = '';
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
           get_product(id) {
               axios({
                   url: `/api/product/${id}` ,
                   method: 'get' ,
               })
                   .then(res => {
                       console.log(res);
                       this.product = res.data;
                   })
                   .catch(err => {
                       console.log(err.response);
                   })
           }
        } ,
    }
</script>

<style scoped>

</style>