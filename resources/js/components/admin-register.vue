<template>
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="register-form" v-if="signup === 0">
                        <div class="form-group">
                            <label for="phone_number"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="number" v-model="phone_number" name="phone_number" id="phone_number" placeholder="Your phone number"/>
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" v-model="email" name="email" id="email" placeholder="Your Email(optional)"/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" v-model="password" name="pass" id="pass" placeholder="Password"/>
                        </div>

                        <div v-if="loading === 1" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>


                        <div class="form-group form-button">
                            <input type="button" name="signup" @click="register" id="signup" class="form-submit" value="Get Code"/>
                        </div>
                    </form>
                    <form method="POST" class="register-form" id="register-form" v-if="signup === 1">
                        <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="number" v-model="code" name="name" id="name" placeholder="Sent Code"/>
                        </div>

                        <div v-if="loading === 1" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>


                        <div class="form-group form-button">
                            <input type="button" name="signup" @click="verifyCode" id="signup" class="form-submit" value="Verify"/>
                        </div>
                    </form>

                </div>
                <div class="signup-image">
                    <figure><img src="/adminAuth/images/signup-image.jpg" alt="sing up image"></figure>
                    <router-link to="/login/admin" class="signup-image-link">I am already admin</router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "admin-register" ,

        data() {
            return {
                phone_number: '' ,
                email: '' ,
                password: '' ,
                signup: 0 ,
                error: '' ,
                code: '' ,
                loading: '' ,
                token: ''
            }
        } ,

        methods: {
            verifyCode() {
                this.loading = 1;
                axios({
                    method: 'post' ,
                    url: '/api/verification' ,
                    data: {
                        phone_number: this.phone_number ,
                        code: this.code
                    }
                })
                    .then(res => {
                        this.loading = 0;
                        console.log(res);
                        localStorage.setItem('token' , this.token);
                        window.location.href = '/admin/products-list'
                    })
                    .catch(err => {
                        this.loading = 0;
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
            register() {
                this.loading = 1;
                axios({
                    method: 'post' ,
                    url: '/api/registerAdmin' ,
                    data: {
                        phone_number: this.phone_number ,
                        email: this.email ,
                        password: this.password
                    }
                })
                    .then(res => {
                        this.signup = 1;
                        this.loading = 0;
                        console.log(res);
                        this.token = res.data.access_token;
                    })
                    .catch(err => {
                        this.loading = 0;
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
        }
    }
</script>

<style scoped>
    .lds-ellipsis {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ellipsis div {
        position: absolute;
        top: 33px;
        width: 13px;
        height: 13px;
        border-radius: 50%;
        background: #6dabe4;
        animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
        left: 8px;
        animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
        left: 8px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
        left: 32px;
        animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
        left: 56px;
        animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
        0% {
            transform: scale(0);
        }
        100% {
            transform: scale(1);
        }
    }
    @keyframes lds-ellipsis3 {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(0);
        }
    }
    @keyframes lds-ellipsis2 {
        0% {
            transform: translate(0, 0);
        }
        100% {
            transform: translate(24px, 0);
        }
    }

</style>