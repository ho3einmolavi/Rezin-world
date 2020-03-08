<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-md-8">
                <form class="needs-validation" novalidate>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputname">نام محصول</label>
                        <input type="text" v-model="title" class="form-control" id="inputname" placeholder="نام محصول را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="validationTextarea">توضیحات محصول(اختیاری)</label>
                        <textarea class="form-control" v-model="description" id="validationTextarea" placeholder="توضیحات محصول را وارد کنید" required=""></textarea>
                        <div class="invalid-feedback">
                            لطفا توضیحات محصول را وارد کنید
                        </div>
                    </div>

                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputState1">دسته بندی محصول</label>
                        <select id="inputState1" @click="getCategorybrands(main_id)" class="form-control form-option select-size" v-model="main_id">
                            <option v-for="item in second_categories" v-bind:key="item.id" :value="item">
                                {{item.name}}
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputState">برند محصول را انتخاب کنید</label>
                        <select id="inputState" class="form-control form-option select-size" v-model="brand_id">
                            <option v-for="br in category_brands" v-bind:key="br.id" :value="br.id">{{br.name}}</option>
                        </select>
                    </div>





                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputState">نام ویژگی و مقادیر آن را وارد کنید</label>
                        <b-form inline>
                            <b-input
                                    class="mb-2 mr-sm-2 mb-sm-0"
                                    placeholder="نام ویژگی"
                                    v-model="name"
                            ></b-input>

                            <b-form-tags
                                    v-model="values"
                                    class="mb-2 mr-sm-2 mb-sm-0"
                                    placeholder="مقادیر ویژگی"
                            ></b-form-tags>

                            <b-button @click="add_feature" variant="primary" class="mb-2 mr-sm-2 mb-sm-0">افزودن</b-button>
                        </b-form>
                    </div>




                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputEmail4">قیمت (به تومان)</label>
                        <input type="text" v-model="price" class="form-control" id="inputEmail4" placeholder="قیمت محصول را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputname2">چند درصد میخواهید تخفیف دهید؟ (به طور مثال 10 درصد)</label>
                        <input type="number" v-model="discount" class="form-control" id="inputname2" placeholder="تخفیف">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputname21">تعداد موجودی </label>
                        <input type="number" v-model="number" class="form-control" id="inputname21" placeholder="تعداد موجودی را وارد کنید">
                    </div>

                    <!--<div class="custom-file">-->
                        <!--<input type="file" multiple class="custom-file-input" id="customFile" ref="img" v-on:change="handle()">-->
                        <!--&lt;!&ndash;<label class="custom-file-label" for="customFile" style="margin-right: 15px;margin-top: 10px;">انتخاب عکس</label>&ndash;&gt;-->
                    <!--</div>-->
                    <h6> حداکثر 5 عکس میتوانید آپلود کنید</h6>
                    <div class="add-image col-xs col-sm col-10 col-md col-lg col-xl-12 flex">
                        <div class="add-image-inside col-xs col-sm col-10 col-md col-lg col-xl-3">
                            <span class="btn btn-success fileinput-button">
                                  <i class="glyphicon glyphicon-plus"></i>
                                  <span>Add files...</span>
                                  <input type="file" ref="img" @change="handle" multiple="">
                            </span>

                        </div>
                        <div v-if="img.length" v-for="image in imageUrl" class="add-image-1 col-xs col-sm col-10 col-md col-lg col-xl-2 delete-padding">
                            <img :src="image" alt="">
                        </div>
                    </div>


                    <button class="btn btn-primary" type="button" v-on:click="store" style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن محصول </button>
                </form>
            </div>
            <div class="progress">
                <div class="progress-bar" role="progressbar" :style="'width:'+ percent + '%'" :aria-valuenow="percent" aria-valuemin="0" aria-valuemax="100">{{percent}}%</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "add-products" ,

        created() {
            console.log("add-product-content component");
            this.get_brands();
        } ,


        props: ['second_categories'] ,

        data() {
            return {
                category_brands: [] ,
                imageUrl: [] ,
                percent: 0 ,
                brands: [] ,
                main_id: '' ,
                title: '' ,
                description: '' ,
                price: '' ,
                brand_id: '' ,
                discount: 0 ,
                number: 1 ,
                img: [] ,
                files: [] ,
                features: [

                ] ,
                name: '' ,
                values: []
            }
        } ,

        methods: {
            add_feature() {
                let obj = {
                    feature_name: this.name ,
                    feature_values: this.values ,
                };

               this.features.push(obj);
               this.name = '';
               this.values = []
            } ,
            getCategorybrands(category) {
                this.category_brands = [];
                this.brands.forEach(item => {
                    if (item.main_category_id === category.main_category_id)
                    {
                        this.category_brands.push(item)
                    }
                })
            } ,


            handle() {
                   this.img = this.$refs.img.files;

                    if (this.imageUrl.length <= 4 )
                    {
                        if (this.img.length <= 5)
                        {
                            for (let i = 0; i < this.img.length; i++) {
                                this.imageUrl.push(URL.createObjectURL(this.img[i]));
                                this.files.push(this.img[i]);
                            }
                        }
                    }
            } ,
            store() {
                this.percent = 0;
                let data = new FormData();
                if (this.files !== '' && this.files !== null)
                {
                    for (let i = 0; i <this.files.length; i++) {
                        data.append('files[]' , this.files[i]);
                    }

                    data.append('title' , this.title);
                    data.append('description' , this.description);
                    data.append('secondary_category_id' , this.main_id.id);
                    data.append('price' , this.price);
                    data.append('brand_id' , this.brand_id);
                    data.append('discount' , (100 - this.discount) / 100);
                    data.append('number' , this.number);
                    data.append('features' , JSON.stringify(this.features));

                    axios({
                        url: '/api/store' ,
                        method: 'post' ,
                        data: data ,
                        headers: {
                            'Content-type': 'multipart/form-data' ,
                            Authorization: `Bearer ${localStorage.getItem('token')}`
                        } ,
                        onUploadProgress: uploadEvent => {
                            this.percent = Math.round(uploadEvent.loaded / uploadEvent.total * 100);
                        }
                    })
                        .then(res => {
                            console.log(res);
                            this.brands = res.data;
                            this.$toasted.success('محصول با موفقیت اضافه شد' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(1500);
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
                            this.brands = [];
                        })
                }
            } ,
            get_brands() {
                axios({
                    url: `/api/brands` ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.brands = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.brands = [];
                    })
            } ,
        }
    }
</script>

<style scoped>
    .add-image-inside {
        height: 50px;
        background-color: ;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .add-image {
        height: 100px;
        background-color:;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }
    .add-image-1{
        width: 75px;
        height: 100px;
        border:1px solid #ff7a76;
        background-color: #fff;
        margin-right:10px;
    }

    .add-image-1 img{
        width: 75px;
        height: 100px;
    }
    .fileinput-button {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }
    .btn-success {
        color: #fff;
        background-color: #ff7a76;
        border-color: #ff7a76;
    }

    .glyphicon {
        position: relative;
        top: 1px;
        display: inline-block;
        font-family: 'Glyphicons Halflings' , irs;
        font-style: normal;
        font-weight: 400;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .fileinput-button input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        opacity: 0;
        -ms-filter: 'alpha(opacity=0)';
        font-size: 200px !important;
        direction: ltr;
        cursor: pointer;
    }

    input[type=file] {
        display: block;
    }
</style>