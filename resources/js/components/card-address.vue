<template>
    <div class="col-xs col-sm col- col-md-9 col-lg-9 col-xl-9  buy-card-right">
        <div class="col-xs col-sm col- col-md-12 col-lg-12 col-xl-12">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-right-top">
                <span>  انتخاب آدرس تحویل سفارش </span>
            </div>

            <div class="col-xs col-sm col- col-md col-lg col-xl-12  card-address-right-bottom delete-padding">
                <div class="col-xs col-sm col- col-md col-lg col-xl-12  card-address-right-bottom-1 delete-padding flex">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-3 card-address-right-bottom-1-right">
                        <span class="title-4 text-black">  گیرنده : <span class="title-4 text-black"> {{show.first_name}} {{show.last_name}} </span> </span>

                    </div>

                    <div class="col-xs col-sm col- col-md col-lg col-xl-9 card-address-right-bottom-1-left">
                        <div class="input-Change-address">
                            <a href="#"><span class="title-4 text-black tablinks" onclick="openCity(event, 'Horizontal')"> تغییر ادرس ارسال  </span></a>
                        </div>
                    </div>
                </div>


                <div class="col-xs col-sm col- col-md col-lg col-xl-12  card-address-right-bottom-2 delete-padding flex">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-3 card-address-right-bottom-2-right">
                        <span class="title-4 text-black">  شماره تماس  : {{show.phone_number}}   </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-9 card-address-right-bottom-2-left">
                        <span class="title-4 text-black">  کد پستی  : <span> {{show.postal_code}} </span> </span>
                    </div>
                </div>


                <div class="col-xs col-sm col- col-md col-lg col-xl-12  card-address-right-bottom-3 delete-padding">
                    <span class="title-4 text-black">نشانی : <span>{{show.address}}</span> </span>
                </div>
            </div>
        </div>

        <!----->

        <div class="col-xs col-sm col- col-md col-lg col-xl-12 edite-form tabcontent" id="Horizontal">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  buy-card-right-top">
                <span>  ویرایش اطلاعات </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 edite-form-inside">


                <div class="form-row">
                    <div class="col-xl-10 mb-3">
                        <input type="text" class="form-control" v-model="show.first_name" id="validationToholtip01" placeholder ="نام" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-xl-10 mb-3">
                        <input type="text" class="form-control" v-model="show.last_name" id="validationTooltip01" placeholder ="نام خانوادگی" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-xl-10 mb-3">
                        <input type="text" class="form-control" v-model="show.address" id="validationTdooltip01" placeholder ="نشانی جدید را وارد کنید" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-xl-10 mb-3">
                        <input type="text" class="form-control" v-model="show.postal_code" id="validadetionTooltip01" placeholder ="کدپستی" required>
                        <div class="valid-tooltip">
                            Looks good!
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-xl-10 mb-3" style="font-family: irs">
                        <b-button @click="edit_user" variant="outline-primary">ویرایش اطلاعات</b-button>
                    </div>
                </div>

            </div>

        </div>




        <!----->
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 card-factor">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12  card-factor-top">
                <span> صدور فاکتور  </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 card-factor-bottom">
                <div class="col-xs col-sm col- col-md col-lg col-xl-4 card-factor-bottom-inside">
                    <input type="checkbox" v-model="hasFactor" @change="wantFactor" name="gender"> درخواست ارسال فاکتور  خرید<br>
                </div>
            </div>
        </div>

        <div class="col-xs col-sm col- col-md col-lg col-xl-12 card-factor-end flex">
            <div class="col-xs col-sm col- col-md col-lg col-xl-6 card-factor-end-right">
                <span><i class="fas fa-angle-double-right"></i></span>
                <router-link to="/card/products"><span class="title-4">  بازگشت به سبد خرید  </span></router-link>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-6 card-factor-end-left">
              <span style="cursor: pointer" @click="where_to_go" class="title-4"> تایید و ادامه ثبت سفارش  </span>
                <span><i class="fas fa-angle-double-left"></i></span>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "card-address" ,
        props: ['show'] ,

        created() {
            this.wantFactor();
        } ,

        data() {
            return {
                check: '' ,
                sum: '' ,
                error: '' ,
                errorMessage: '' ,
                hasFactor: false
            }
        } ,
        methods: {
            where_to_go() {
             if (this.$route.path === '/card/address')
                {
                    if (this.show.first_name && this.show.last_name
                        && this.show.address && this.show.postal_code)
                    {
                        this.$router.push({ path: '/card/pay' })
                    }
                    else
                    {
                        this.$toasted.show('لطفا اطلاعات خود را کامل کنید', {
                            position: 'top-center' ,
                            type: 'error' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            fullWidth: true ,
                            className: ['your-custom-class']
                        }).goAway(2000);
                    }
                }
            } ,
            wantFactor() {
               this.$emit('factor' , this.hasFactor)
            } ,
            edit_user() {
                axios({
                    url: '/api/edit' ,
                    method: 'post' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    } ,
                    data: {
                        first_name: this.show.first_name ,
                        last_name: this.show.last_name ,
                        phone: this.show.phone ,
                        phone_number: this.show.phone_number ,
                        email: this.show.email ,
                        postal_code: this.show.postal_code ,
                        city: this.show.city ,
                        state: this.show.state ,
                        address: this.show.address ,
                    }
                })
                    .then(res => {
                        console.log(res);
                        // this.show = res.data;
                        this.$toasted.show('تغییرات با موفقیت اعمال شد', {
                            position: 'bottom-center' ,
                            type: 'success' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            className: ['your-custom-class']
                        }).goAway(2000);
                        this.$emit('check-user' , res.data);
                    })
                    .catch(err => {
                        console.log(err.response);
                        err.response.data.forEach(error => {
                            this.$toasted.show(error, {
                                position: 'bottom-center' ,
                                type: 'error' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(2000);
                        });

                        this.$emit('check-user' , this.show);
                    });
            } ,
            cost() {
                let s = 0;
                let a = JSON.parse(localStorage.order);
                a.forEach(item => {
                    s += item.final_price1;
                });
                this.sum = s;
                this.$emit('final-cost' , this.sum);
            } ,
        }
    }
</script>

<style scoped>

</style>