<template>
    <div class="col col-sm col-md-12 col-lg col-xl  header-main delete-padding">

        <!-------->
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
                <img :src="'/images/logo/' + setting_data.logo">
            </div>
            <div class="col-xs-6 col-5 col-sm-6 col-md-8 col-lg col-xl-10 header-main-top-right delete-res">
                <a href="/"><span class="text-main title-4">  صفحه اصلی </span></a>
                <a href=""><span class="text-main title-4"> دسته بندی ها </span></a>
                <a href=""><span class="text-main title-4"> تعرفه ها  </span></a>
                <a href=""><span class="text-main title-4">  وبلاگ </span></a>
                <a href=""><span class="text-main title-4"> پیشنهاد ناب </span></a>
                <a href="/contact-us"><span class="text-main title-4"> تماس با ما </span></a>
            </div>


            <div class="col-xs-6 col-6 col-sm-4 col-md-4 col-lg-3 col-xl header-main-top-left">

                <!-- partial:index.partial.html -->
                <nav class="main-nav" v-if="showAuth && !user">
                    <ul>
                        <li><a class="signup" href="#0">ثبت نام   </a></li>
                        <li><a class="signin" href="#0">  ورود </a></li>
                    </ul>
                </nav>
                <div class="col-xs- col- col-sm- col-md- col-lg- col-xl-6" v-if="showAuth && user && (!user.first_name || !user.last_name)" style="padding-right: 0px; padding-left: 0px">
                    <ul>
                        <li style="padding-top: 8px"><a style="color: #676767" href="/user/profile">حساب کاربری</a></li>
                    </ul>
                </div>

                <div class="col-xs- col- col-sm- col-md- col-lg- col-xl-6" v-if="showAuth && user && user.first_name && user.last_name" style="padding-right: 0px; padding-left: 0px">
                    <ul>
                        <li style="padding-top: 8px"><a style="color: #676767" href="/user/profile">{{user.first_name}} {{user.last_name}}</a></li>
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
                                    <input class="full-width has-padding auth-button" @click="verifyCode" type="button" value="دریافت کد">
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


        <!---------------------->
        <div class="col col-sm col-md-12 col-lg col-xl-12 header-main-bottom-pages delete-padding">
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
                                    <button type="button" @click="search" class="btn btn-link search-btn">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col col-sm col-md-2 col-lg col-xl-1  logo-like flex delete-padding">-->
                        <!--<span class="text-main"><i class="far fa-heart"></i> </span>-->
                        <!--<span class="text-main title-4 tuman">  مورد علاقه </span>-->
                        <!--<span style="color: red;" class="tuman"> 1 </span>-->
                    <!--</div>-->
                    <div  class="col-1 col-sm col-md-2 col-lg col-xl-1 logo-buy-cart flex delete-padding">
                        <a href="/card/products"><span class="text-main"> <i class="fas fa-cart-plus"></i> </span></a>
                        <a href="/card/products"><span class="text-main title-4 tuman"> {{show.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}} تومان  </span></a>
                    </div>
                </div>
            </div>
            <div class="col col-sm col-md-12 col-lg col-xl header-main-bottom-span">
                <div style="display: block ruby;display: -webkit-inline-box" class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl header-main-bottom-span-inside">
                    <div v-if="router === 0" v-for="item in main_categories">
                        <a :href="'/products/category/' + item.id"><span class="text-main title-4"> {{item.name}} </span></a>
                    </div>
                    <div v-if="router === 1" v-for="item in main_categories">
                        <router-link  v-bind:key="item.id"  :to="'/products/category/' + item.id"><span class="text-main title-4"> {{item.name}} </span></router-link>
                    </div>
                </div>
            </div>

            <div class="col col-sm col-xs col-md col-lg col-xl-12 header-main-bottom-slideshow">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "another-header" ,

        created() {
            this.get_user();
            this.getCat();
            this.specifyTheRoute();
            this.get_number1();
            this.setting();
        } ,

        data() {
            return {
                main_categories: [] ,
                router: '' ,
                secondary_cats: [] ,
                main_id: '' ,
                title: '' ,
                sum: '' ,
                show: '' ,
                orders: [] ,
                user: null ,
                code: '' ,
                phone_number: '' ,
                email: '' ,
                password: '' ,
                login: '' ,
                signup: 0 ,
                error: '' ,
                token: '' ,
                setting_data: [] ,
                showAuth: null
            }
        } ,

        props: ['order'] ,


        watch: {
            order: function () {
                this.get_number();
            } ,
            '$route' (to , from) {
                if (to.params.id)
                {
                    // this.productsByCat(this.$route.params.id , this.param);
                    this.main_id = to.params.id;
                    this.get_second(this.main_id);
                }
                if (to.params.sec)
                {
                    this.main_id = to.params.main;
                }
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
                        this.$emit('setting' , this.setting_data)
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
            get_user() {
                axios({
                    method: 'get' ,
                    url: '/api/user' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        this.showAuth = 1;
                        console.log(res);
                        this.user = res.data;
                        this.$emit('user' , this.user);
                    })
                    .catch(err => {
                        this.showAuth = 1;
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
                        window.location = '/';
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
                    this.$emit('add-order' , this.orders);
                }
            } ,
            get_number() {
                const add = (a , b) => a + b ;
                this.sum = [];
                this.order.forEach(item => {
                    this.sum.push(item.final_price1)
                });
                this.sum = this.sum.reduce(add);
                this.show = this.sum;
                this.$emit('add-order' , this.order);
            } ,
            search() {
                if (this.router === 1)
                {
                    if (this.title !== '')
                    {
                        this.$router.push({ path: `/products/search/${this.title}` })
                    }
                }
                else
                {
                    if (this.title !== '')
                    {
                        window.location = `/products/search/${this.title}`;
                    }
                }
            } ,
            get_second(id) {
                this.secondary_cats = [];
                this.main_categories.forEach(item => {
                    if (id == item.id)
                    {
                        this.secondary_cats = item
                    }
                });
                this.$emit('first-emit-cat' , this.secondary_cats);
            } ,

            specifyTheRoute() {
                if (this.$route.params.id)
                {
                    // this.productsByCat(this.$route.params.id , this.param);
                    this.main_id = this.$route.params.id;
                }
                //
                // if (this.$route.params.title)
                // {
                //     this.search(this.$route.params.title , this.param);
                // }
                //
                if (this.$route.params.sec)
                {
                    this.main_id = this.$route.params.main;
                }

               if (this.$route.name === 'product')
               {
                   this.router = 1
               }
                else
               {
                   this.router = 0
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
                        this.$emit('mainCategories' , this.main_categories);
                        this.get_second(this.main_id);
                    })
                    .catch(err => console.log(err.response))
            } ,
        }
    }
</script>

<style scoped>
    .search-form {
        margin-bottom: 0px !important;
    }
</style>