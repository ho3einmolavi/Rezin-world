<template>
    <div class="col col-sm col-md-12 col-lg col-xl  header-main delete-padding">
        <div class="col-md-12 header-main-top flex">
            <div class="col-xs col-1 col-sm-2 col-md col-lg-1 col-xl menu-res">
                <input type="checkbox" id="menu-hamburguer" class="input-none">
                <label for="menu-hamburguer">
                    <div class="menu-responsive">
                        <span class="hamburguer"></span>
                    </div>
                </label>
                <nav class="nav-nav">
                    <ul>
                        <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                    </ul>
                </nav>
            </div>



            <div class="col-xs-6 col-5 col-sm-6 col-md-5 col-lg col-xl logo-site-res">
                <img src="/img/header/payjoy.png">
            </div>
            <div class="col-xs-6 col-5 col-sm-6 col-md-8 col-lg col-xl-10 header-main-top-right delete-res">
                <a href="/"><span class="text-main title-4">  صفحه اصلی </span></a>
                <a href=""><span class="text-main title-4"> دسته بندی ها </span></a>
                <a href=""><span class="text-main title-4"> تعرفه ها  </span></a>
                <a href=""><span class="text-main title-4">  وبلاگ </span></a>
                <a href=""><span class="text-main title-4"> پیشنهاد ناب </span></a>
                <a href=""><span class="text-main title-4"> تماس با ما </span></a>
            </div>
            <div class="col-xs-6 col-6 col-sm-4 col-md-4 col-lg-3 col-xl header-main-top-left">

                <!-- partial:index.partial.html -->
                <nav class="main-nav" v-if="! user">
                    <ul>
                        <li><a class="signup" href="#0">ثبت نام   </a></li>
                        <li><a class="signin" href="#0">  ورود </a></li>
                    </ul>
                </nav>
                <div class="col-xs- col- col-sm- col-md- col-lg- col-xl-6" v-if="user">
                    <ul>
                        <li v-if="!user.first_name || !user.last_name"><a href="/user/profile">حساب کاربری</a></li>
                        <li v-if="user.first_name && user.last_name"><a href="/user/profile">{{user.first_name}} {{user.last_name}}</a></li>
                    </ul>
                </div>

                <div class="user-modal">
                    <div class="user-modal-container">
                        <ul class="switcher">
                            <li><a href="#0">ورود  </a></li>
                            <li><a href="#0">ساخت اکانت جدید</a></li>
                        </ul>

                        <div id="login">
                            <form class="form">
                                <p class="fieldset">
                                    <label class="image-replace email" for="signin-email">ایمیل یا شماره موبایل</label>
                                    <input v-model="login" class="full-width has-padding has-border" id="signin-email" type="text" placeholder="ایمیل یا شماره موبایل">
                                    <span class="error-message">An account with this email address does not exist!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace password" for="signin-password">رمز عبور</label>
                                    <input v-model="password" class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="رمز عبور">
                                    <a href="#0" class="hide-password">نمایش</a>
                                    <span class="error-message">Wrong password! Try again.</span>
                                </p>


                                <p class="fieldset">
                                    <input class="full-width auth-button" type="button" value="ورود" @click="loginTheUser">
                                </p>
                            </form>

                            <p class="form-bottom-message"><a href="#0">رمز عبور خود را فراموش کرده اید؟</a></p>
                            <!-- <a href="#0" class="close-form">Close</a> -->
                        </div>

                        <div id="signup">
                            <form class="form" v-if="signup === 0">
                                <p class="fieldset">
                                    <label class="image-replace username" for="signup-username">ایمیل</label>
                                    <input v-model="email" class="full-width has-padding has-border" id="signup-username" type="email" placeholder="ایمیل">
                                    <span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace email" for="signup-email">شماره موبایل</label>
                                    <input v-model="phone_number" class="full-width has-padding has-border" id="signup-email" type="number" placeholder="شماره موبایل">
                                    <span class="error-message">Enter a valid email address!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace password" for="signup-password">رمز عبور</label>
                                    <input v-model="password" class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="رمز عبور">
                                    <a href="#0" class="hide-password">نمایش</a>
                                    <span class="error-message">Your password has to be at least 6 characters long!</span>
                                </p>

                                <p class="fieldset">
                                    <input class="full-width has-padding auth-button" @click="register" type="button" value="دریافت کد">
                                </p>

                                <div class="alert alert-warning" v-if="error === 0">
                                    <div>
                                        <span style="float: right"> در حال ارسال اطلاعات شما ...</span>
                                    </div>
                                    <div class="loader"></div>
                                </div>

                            </form>

                            <form class="form" v-if="signup === 1">
                                <p class="fieldset">
                                    <label class="image-replace username" for="signup-username1">کد تایید</label>
                                    <input v-model="code" class="full-width has-padding has-border" id="signup-username1" type="number" placeholder="کد تایید">
                                    <span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
                                </p>

                                <p class="fieldset">
                                    <input class="full-width has-padding auth-button" @click="verifyCode" type="button" value="ثبت کد">
                                </p>

                                <div class="alert alert-warning" v-if="error === 0">
                                    <div>
                                        <span style="float: right"> در حال ارسال اطلاعات شما ...</span>
                                    </div>
                                    <div class="loader"></div>
                                </div>

                            </form>
                        </div>

                        <div id="reset-password">
                            <p class="form-message">Lost your password? Please enter your email address.</br> You will receive a link to create a new password.</p>

                            <form class="form">
                                <p class="fieldset">
                                    <label class="image-replace email" for="reset-email">E-mail</label>
                                    <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                                    <span class="error-message">An account with this email does not exist!</span>
                                </p>

                                <p class="fieldset">
                                    <input class="full-width has-padding" type="submit" value="Reset password">
                                </p>
                            </form>

                            <p class="form-bottom-message"><a href="#0">Back to log-in</a></p>
                        </div>
                        <a href="#0" class="close-form">Close</a>
                    </div>
                </div>
                <!-- partial -->
            </div>
        </div>



        <div class="col col-sm col-md-12 col-lg col-xl-12 header-main-bottom delete-padding">
            <div class="margin-top">
                <div class="col col-sm col-md-12 col-lg col-xl header-main-bottom-search flex">
                    <div class="col col-sm col-md-2 col-lg col-xl-2 logo-site">
                        <a href="/"><img :src="'/images/logo/' + setting_data.logo"></a>
                    </div>
                    <div class="logo-site-border">
                        <span> | </span>
                    </div>
                    <div class="col-2 col-sm col-md-2 col-lg col-xl-1 logo-number">
                        <span class="text-main title-4">  {{setting_data.consultant_mobile}} </span>
                    </div>
                    <div class="col-10 col-sm-7 col-md-4 col-lg-6 col-xl-6 logo-search">
                        <div class="col-xs col col-sm col-md-12 col-lg col-xl delete-padding">

                            <div class="search-box">
                                <form class="search-form">
                                    <input class="form-control" v-model="title" @keypress.enter="search" placeholder="جستجو : محصول , گروه محصول" type="text">
                                    <button @click="search" type="button" class="btn btn-link search-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col col-sm col-md-2 col-lg col-xl-1  logo-like flex delete-padding">
                        <span class="text-main"><i class="far fa-heart"></i> </span>
                        <span class="text-main title-4 tuman">  مورد علاقه </span>
                        <span style="color: red;" class="tuman"> 1 </span>
                    </div>
                    <div class="col-1 col-sm col-md-2 col-lg col-xl-1 logo-buy-cart flex delete-padding">
                        <a href="/card/products">
                            <span class="text-main"> <i class="fas fa-cart-plus"></i></span>
                        </a>
                        <span class="text-main title-4 tuman"> {{show.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان  </span>
                    </div>
                </div>
            </div>
            <div class="col col-sm col-md-12 col-lg col-xl header-main-bottom-span">
                <div class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl header-main-bottom-span-inside">
                    <a v-for="item in main_categories" :href="'/products/category/' + item.id"><span class="text-main title-4"> {{item.name}} </span></a>
                </div>
            </div>
            <div class="col col-sm col-xs col-md col-lg col-xl-12 header-main-bottom-slideshow">
                <!-- partial:index.partial.html -->
                <div class='widget'>
                    <div class='slideshow-nav'>
                        <div>
                            <span class='fa fa-chevron-up' id='prev'></span>
                        </div>
                        <div>
                            <span class='fa fa-chevron-down' id='next'></span>
                        </div>
                    </div>
                    <div class='cycle-slideshow div' data-cycle-fx='scrollVert' data-cycle-next='#next' data-cycle-prev='#prev' data-cycle-slides='figure' data-cycle-timeout='0' style="z-index: 1;">


                        <!--slide-1-->
                        <figure v-for="item in slides">
                            <figcaption>
                                <div class="div-star">
                                    <!---->
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
                                    <!---->
                                </div>
                                <div class="div-subject"><span class="title-4 text-black"> {{item.title}}  </span> </div>
                                <div class="div-best"><span class="title-4 text-black">(با بهترین کیفیت)</span></div>
                                <div class="div-des"><span class="title-4 text-black">با ما در رزین ولد همراه باشید   </span></div>
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 div-price flex">
                                    <div class="col col-sm col-xs col-md col-lg col-xl-6 div-price-right">
                                        <span class="title-4 text-black" v-if="item.price !== item.final_price"> {{item.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} </span>
                                    </div>
                                    <div class="col col-sm col-xs col-md col-lg col-xl-6 div-price-left">
                                        <span><b> {{item.final_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} </b><span class="title-4 text-black"> تومان </span> </span>
                                    </div>
                                </div>
                                <div class="col col-sm col-xs col-md col-lg col-xl-12 div-buy flex">
                                    <div style="cursor: pointer" class="col col-sm col-xs col-md col-lg col-xl-6 div-buy-right">
                                        <a :href="'/single/' + item.id">
                                            <div class="div-buy-right-input">
                                                <span> محصول </span>
                                            </div>
                                        </a>

                                    </div>
                                    <div @click="sent_to_card(item)" style="cursor: pointer" class="col col-sm col-xs col-md col-lg col-xl-6 div-buy-left">
                                        <div class="div-buy-left-input">
                                            <span>خرید   </span>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                            <div class="img-slide">
                                <img :src="'/images/products/' + item.images[0]">
                            </div>
                        </figure>

                    </div>
                </div>
                <!-- partial -->
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "main-header" ,

        created() {
            this.get_user();
            this.getCat();
            this.get_slides();
            this.get_number1();
            this.setting();
        } ,

        data() {
            return {
                main_categories: [] ,
                title: '' ,
                slides: [] ,
                login: '' ,
                email: '' ,
                password: '' ,
                phone_number: '' ,
                code: '' ,
                error: '' ,
                signup: 0 ,
                orders: [] ,
                sum: 0 ,
                show: '' ,
                token: '' ,
                user: [] ,
                setting_data: []
            }
        } ,

        methods: {
            setting() {
                axios({
                    url: '/api/setting/index' ,
                    method: 'get' ,
                    headers: {
                        accept: 'application/json'
                    } ,
                })
                    .then(res => {
                        console.log(res);
                        this.setting_data = res.data[0];
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.$toasted.error(err.response.data, {
                            position: 'bottom-center' ,
                            theme: 'bubble' ,
                            fitToScreen: true
                        }).goAway(3000);
                    })
            } ,
            loginTheUser() {
                axios({
                    method: 'post' ,
                    url: '/api/login' ,
                    data: {
                        login: this.login ,
                        password: this.password
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.user = res.data.user;
                        localStorage.setItem('token' , res.data.access_token);
                        window.location = '/'
                    })
                    .catch(err => {
                        this.user = null;
                        console.log(err.response);
                        err.response.data.forEach(error => {
                            this.$toasted.show(error, {
                                position: 'bottom-center' ,
                                type: 'error' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(2000);
                        })
                    })
            } ,
            get_user() {
                axios({
                    method: 'get' ,
                    url: '/api/user' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.user = res.data;
                    })
                    .catch(err => {
                        this.user = null;
                        console.log(err.response);
                    })
            } ,
            verifyCode() {
                axios({
                    method: 'post' ,
                    url: '/api/verification' ,
                    data: {
                        phone_number: this.phone_number ,
                        code: this.code
                    }
                })
                    .then(res => {
                        console.log(res);
                        localStorage.setItem('token' , this.token);
                        window.location = '/'
                    })
                    .catch(err => {
                        console.log(err.response);
                        err.response.data.data.forEach(error => {
                            this.$toasted.show(error, {
                                position: 'bottom-center' ,
                                type: 'error' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(2000);
                        })
                    })
            } ,
            get_number1() {
                if (! localStorage.order)
                {
                    this.show = 0;
                }
                else {
                    this.orders = JSON.parse(localStorage.order);
                    const add = (a , b) => a + b ;
                    this.sum = [];
                    this.orders.forEach(item => {
                        this.sum.push(item.final_price1)
                    });
                    this.sum = this.sum.reduce(add);
                    this.show = this.sum;
                    // this.$emit('add-order' , this.orders);
                }
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
                this.get_number1();
            } ,
            register() {
                this.error = 0;
                axios({
                    method: 'post' ,
                    url: '/api/register' ,
                    data: {
                        phone_number: this.phone_number ,
                        email: this.email ,
                        password: this.password
                    }
                })
                    .then(res => {
                        this.signup = 1;
                        this.error = 1;
                        console.log(res);
                        this.token = res.data.access_token;
                    })
                    .catch(err => {
                        this.error = 1;
                        console.log(err.response);
                        err.response.data.forEach(error => {
                            this.$toasted.show(error, {
                                position: 'bottom-center' ,
                                type: 'error' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(2000);
                        })

                    })
            } ,
            get_slides() {
                axios({
                    method: 'get' ,
                    url: '/api/slideShow'
                })
                    .then(res => {
                        console.log(res);
                        this.slides = res.data;
                    })
                    .catch(err => console.log(err.response))
            } ,
            search() {
                if (this.title !== '')
                {
                    window.location = `/products/search/${this.title}`
                }
            } ,
            getCat() {
                axios({
                    method: 'get' ,
                    url: '/api/menu'
                })
                    .then(res => {
                        console.log(res);
                        this.main_categories = res.data;
                       // this.$emit('first-emit-cat' , this.main_categories);
                    })
                    .catch(err => console.log(err.response))
            } ,
        }
    }
</script>

<style scoped>
    .loader {
        border: 5px solid #f3f3f3; /* Light grey */
        border-top: 5px solid deeppink; /* Blue */
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        float: left;
    }
    .alert-warning {
        height: 60px;
        background-color: #dee2e6;
        color: black;
        border: 1px solid #dee2e6;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>