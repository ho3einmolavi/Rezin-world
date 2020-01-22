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
                        <li><a href="login.html" class="ttogle">ورود </a></li>
                        <li><a href="register.html" class="ttogle">ثبت نام</a></li>
                        <li><a href="index.html" class="ttogle">محاسبه قیمت </a></li>
                        <li><a href="contact-us.html" class="ttogle">تماس با ما </a></li>
                        <li><a href="important-points.html" class="ttogle">نکات مهم چاپ</a></li>
                    </ul>
                </nav>
            </div>



            <div class="col-xs-6 col-5 col-sm-6 col-md-5 col-lg col-xl logo-site-res">
                <img src="img/header/payjoy.png">
            </div>
            <div class="col-xs-6 col-5 col-sm-6 col-md-8 col-lg col-xl-10 header-main-top-right delete-res">
                <a href="/"><span class="text-main title-4">  صفحه اصلی </span></a>
                <a href="product-html"><span class="text-main title-4"> دسته بندی ها </span></a>
                <a href=""><span class="text-main title-4"> تعرفه ها  </span></a>
                <a href=""><span class="text-main title-4">  وبلاگ </span></a>
                <a href=""><span class="text-main title-4"> پیشنهاد ناب </span></a>
                <a href=""><span class="text-main title-4"> تماس با ما </span></a>
            </div>
            <div class="col-xs-6 col-6 col-sm-4 col-md-4 col-lg-3 col-xl header-main-top-left">
                <nav class="main-nav">
                    <ul>
                        <li><a class="signup" href="#0">ثبت نام   </a></li>
                        <li><a class="signin" href="#0">  ورود </a></li>
                    </ul>
                </nav>

                <div class="user-modal">
                    <div class="user-modal-container">
                        <ul class="switcher">
                            <li><a href="#0">ورود  </a></li>
                            <li><a href="#0">ساخت اکانت جدید</a></li>
                        </ul>

                        <div id="login">
                            <form class="form">
                                <p class="fieldset">
                                    <label class="image-replace email" for="signin-email">ایمیل</label>
                                    <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
                                    <span class="error-message">An account with this email address does not exist!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace password" for="signin-password">رمز</label>
                                    <input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Password">
                                    <a href="#0" class="hide-password">نمایش</a>
                                    <span class="error-message">Wrong password! Try again.</span>
                                </p>

                                <p class="fieldset">
                                    <input type="checkbox" id="remember-me" checked>
                                    <label for="remember-me">فراموشی رمز عبور</label>
                                </p>

                                <p class="fieldset">
                                    <input class="full-width" type="submit" value="Login">
                                </p>
                            </form>

                            <p class="form-bottom-message"><a href="#0">رمز عبور خود را فراموش کرده اید؟</a></p>
                            <!-- <a href="#0" class="close-form">Close</a> -->
                        </div>

                        <div id="signup">
                            <form class="form">
                                <p class="fieldset">
                                    <label class="image-replace username" for="signup-username">نام کاربری   </label>
                                    <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="نام کاربری">
                                    <span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace email" for="signup-email">ایمیل</label>
                                    <input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="ایمیل">
                                    <span class="error-message">Enter a valid email address!</span>
                                </p>

                                <p class="fieldset">
                                    <label class="image-replace password" for="signup-password">رمز عبور</label>
                                    <input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="رمز عبور">
                                    <a href="#0" class="hide-password">نمایش</a>
                                    <span class="error-message">Your password has to be at least 6 characters long!</span>
                                </p>

                                <p class="fieldset">
                                    <input type="checkbox" id="accept-terms">
                                    <label for="accept-terms">I agree to the <a class="accept-terms" href="#0">Terms</a></label>
                                </p>

                                <p class="fieldset">
                                    <input class="full-width has-padding" type="submit" value="Create account">
                                </p>
                            </form>

                            <!-- <a href="#0" class="cd-close-form">Close</a> -->
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
                        <img src="/img/header/payjoy.png">
                    </div>
                    <div class="logo-site-border">
                        <span> | </span>
                    </div>
                    <div class="col-2 col-sm col-md-2 col-lg col-xl-1 logo-number">
                        <span class="text-main title-4">  03132244704 </span>
                    </div>
                    <div class="col-10 col-sm-7 col-md-4 col-lg-6 col-xl-6 logo-search">
                        <div class="col-xs col col-sm col-md-12 col-lg col-xl delete-padding">
                            <div class="search-box">
                                <form class="search-form">
                                    <input class="form-control" v-model="title" @keypress.enter="search" placeholder="جستجو : محصول , گروه محصول" type="text">
                                    <button @click="search" class="btn btn-link search-btn">
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
                        <span class="text-main"> <i class="fas fa-cart-plus"></i> </span>
                        <span class="text-main title-4 tuman"> 5/450 تومان  </span>
                    </div>
                </div>
            </div>
            <div class="col col-sm col-md-12 col-lg col-xl header-main-bottom-span table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                <a v-if="router === 0" v-for="item in main_categories"  :href="'/products/category/' + item.id"><span class="text-main title-4"> {{item.name}} </span></a>
                <router-link v-if="router === 1" v-for="item in main_categories" v-bind:key="item.id"  :to="'/products/category/' + item.id"><span class="text-main title-4"> {{item.name}} </span></router-link>
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
            this.getCat();
            this.specifyTheRoute();
        } ,

        data() {
            return {
                main_categories: [] ,
                router: '' ,
                secondary_cats: [] ,
                main_id: '' ,
                title: ''
            }
        } ,

        watch: {
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
            search() {
                if (this.title === '')
                {
                    window.location = `/products/search/_`;
                }
                else
                {
                    window.location = `/products/search/${this.title}`;
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

</style>