<template>
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="/adminAuth/images/signin-image.jpg" alt="sing up image"></figure>
                    <router-link to="/register/admin" class="signup-image-link">Create an account</router-link>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Log in</h2>
                    <form method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" v-model="login" name="your_name" id="your_name" placeholder="Your Phone number Or Your Email"/>
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" v-model="password" name="your_pass" id="your_pass" placeholder="Password"/>
                        </div>

                        <div v-if="loading === 1" class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>


                        <div class="form-group form-button">
                            <input type="button" @click="loginTheUser" name="signin" id="signin" class="form-submit" value="Log in"/>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "admin-login" ,

        data() {
            return {
                login: '' ,
                password: '' ,
                loading: ''
            }
        } ,

        methods: {
            loginTheUser() {
                this.loading = 1;
                axios({
                    method: 'post' ,
                    url: '/api/loginAdmin' ,
                    data: {
                        login: this.login ,
                        password: this.password
                    }
                })
                    .then(res => {
                        this.loading = 0;
                        console.log(res);
                        localStorage.setItem('token' , res.data.access_token);
                        window.location.href = '/admin/products-list'
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