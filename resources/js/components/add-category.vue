<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-xs col-sm col- col-md col-lg col-xl-8">
                <form class="needs-validation" novalidate>
                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputname">نام  دسته بندی </label>
                        <input type="text" v-model="name" class="form-control" id="inputname" placeholder="نام دسته بندی را وارد کنید">
                    </div>
                    <!--<div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">-->
                    <!--<label for="validationTextarea">نام  دسته بندی </label>-->
                    <!--<textarea class="form-control" id="validationTextarea" placeholder="توضیح دسته بندی را وارد کنید" required></textarea>-->
                    <!--<div class="invalid-feedback">-->
                    <!--لطفا توضیحات  دسته را واد کنید-->
                    <!--</div>-->
                    <!--</div>-->


                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputState">دسته بندی محصول را انتخاب کنید</label>
                        <select id="inputState" v-model="mother" class="form-control form-option select-size">
                            <option></option>
                            <option v-for="item in allCats">{{item.name}}</option>
                        </select>
                    </div>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputState44">کلمات کلیدی را فقط برای دسته بندی های اصلی وارد کنید</label>
                        <input type="text" v-model="keywords" class="form-control" id="inputState44" placeholder="کلمات کلیدی را با ',' از همدیگر جدا کنید ">

                    </div>



                    <!--<div class="custom-file" style="margin-top: 25px;margin-right: 15px;">-->
                        <!--<input type="file" class="custom-file-input" id="customFile" ref="img" @change="handle">-->
                        <!--<label class="custom-file-label" for="customFile">انتخاب عکس</label>-->
                    <!--</div>-->

                    <!--<div class="custom-file" style="margin-top: 25px;margin-right: 15px;">-->
                        <!--<input type="file" class="custom-file-input" id="customFile1" ref="logo1" @change="handle1">-->
                        <!--<label class="custom-file-label" for="customFile1">انتخاب لوگو (فقط برای دسته بندی های مادر)</label>-->
                    <!--</div>-->

                    <button class="btn btn-primary" type="button" @click="create_cat" style="margin-top: 20px;font-size: 13px;margin-right: 15px;"> افزودن دسته</button>

                    <div class="progress" style="margin-top: 30px">
                        <div class="progress-bar" role="progressbar" :style="'width:'+ percent + '%'" :aria-valuenow="percent" aria-valuemin="0" aria-valuemax="100">{{percent}}%</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "add-category-content" ,

        props: ['allCats'] ,

        created() {
            console.log("add-category-content component");
        } ,

        data() {
            return {
                name: '' ,
                mother: '' ,
                cats: [] ,
                img: '' ,
                percent: 0 ,
                logo: '' ,
                keywords: ''
            }
        } ,

        methods: {
            create_cat() {
                this.percent = 0;
                let data = new FormData();
                data.append('name' , this.name);
                data.append('mother' , this.mother);
                data.append('keywords' , this.keywords);
                axios({
                    url: '/api/create/cat' ,
                    method: 'post' ,
                    data: data ,
                    onUploadProgress: uploadEvent => {
                        this.percent = Math.round(uploadEvent.loaded / uploadEvent.total * 100);
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.$toasted.success('دسته بندی با موفقیت اضافه شد' , {
                            position: 'bottom-center' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            className: ['your-custom-class']
                        }).goAway(1500);
                    })
                    .catch(err => {
                        console.log(err.response);
                        err.response.data.forEach(error => {
                            this.$toasted.error(error , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(3000);
                        })
                    })


            } ,
        }
    }
</script>

<style scoped>

</style>