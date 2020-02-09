<template>
    <div class="col col-sm col-xs col-md col-lg col-xl-12 body-main">
        <center>
            <div class="col col-sm col-xs col-md col-lg col-xl-11 contact-us-main">
                <div class="col col-sm col-xs col-md col-lg col-xl-12 contact-us-main-top">
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 contact-us-main-top-subject delete-padding">
                        <span class="text-black title-2"> تماس با رزین ولد   </span>
                    </div>
                    <div class="col col-sm col-xs col-md col-lg col-xl-12 contact-us-main-top-des delete-padding">
                        <span class="text-black title-4">   در صورت داشتن هر گونه سوال یا انتقاد با ما در ار تباط باشید .  </span>
                    </div>
                </div>
                <hr class="hr-contact">
                <div class="col col-sm col-xs col-md col-lg col-xl-12 contact-us-main-end flex">
                    <div class="col col-sm col-xs col-md col-lg col-xl-6 contact-us-main-end-right delete-padding">
                        <div class="col col-sm col-xs col-md col-lg col-xl-8 contact-us-main-end-right-inside delete-padding">
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <span class="title-4 text-black"> آدرس  <span class="title-4 text-black"> {{setting.address}} </span> </span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-8 contact-us-main-end-right-inside delete-padding">
                            <span><i class="fas fa-phone"></i></span>
                            <span class="title-4 text-black">شماره تماس <span class="title-4 text-black"> {{setting.consultant_mobile}} </span></span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-8 contact-us-main-end-right-inside delete-padding">
                            <span><i class="fas fa-envelope-open"></i></span>
                            <span class="title-4 text-black"> ایمیل <span> {{setting.email}} </span></span>
                        </div>
                        <div class="col col-sm col-xs col-md col-lg col-xl-8 contact-us-main-end-right-inside-soshalmedia">
                            <a :href="setting.telegram"><i class="fab fa-telegram-plane"></i></a>
                            <a :href="setting.instagram"><span><i class="fab fa-instagram"></i></span></a>
                            <a :href="setting.account_number"><span><i class="fab fa-twitter"></i></span></a>
                            <a :href="setting.card_number"><i class="fab fa-facebook"></i></a>
                        </div>
                    </div>


                    <div class="col col-sm col-xs col-md col-lg col-xl-6 contact-us-main-end-left delete-padding">
                        <form>
                            <div class="form-group col-xl-10 margin-bottom-input">
                                <label for="exampleFormControlInput1"></label>
                                <input type="text" class="form-control text-black title-4" id="exampleFormControlInput1" placeholder="نام و نام خانوادگی  ">
                            </div>
                            <div class="form-group  col-xl-10 margin-bottom-input">
                                <label for="exampleFormControlInput1"></label>
                                <input type="email" class="form-control text-black title-4" id="exampleFormControlInput1" placeholder="ایمیل  ">
                            </div>
                            <div class="form-group  col-xl-10 margin-bottom-input">
                                <label for="exampleFormControlTextarea1"></label>
                                <textarea class="form-control text-black title-4" id="exampleFormControlTextarea1" rows="3" placeholder="پیام خود را اینجا بنویسید..."></textarea>
                            </div>
                            <button type="submit" class="btn mb-2 input-send title-4">ارسال</button>
                        </form>
                    </div>
                </div>
            </div>
        </center>


        <!--end-body--></div>
</template>

<script>
    export default {
        name: "contact-us" ,
        props: ['setting']
    }
</script>

<style scoped>

</style>