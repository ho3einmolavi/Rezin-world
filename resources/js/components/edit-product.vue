<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-md-8">
                <form class="needs-validation" novalidate>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputname">نام محصول</label>
                        <input type="text" v-model="product.title" class="form-control" id="inputname" placeholder="نام محصول را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="validationTextarea">توضیحات محصول</label>
                        <textarea class="form-control" v-model="product.description" id="validationTextarea" placeholder="توضیحات محصول را وارد کنید" required=""></textarea>
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
                        <input type="text" v-model="product.price" class="form-control" id="inputEmail4" placeholder="قیمت محصول را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputname2">چند درصد میخواهید تخفیف دهید؟ (به طور مثال 10 درصد)</label>
                        <input type="number" v-model="discount" class="form-control" id="inputname2" placeholder="تخفیف">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputname21">تعداد موجودی </label>
                        <input type="number" v-model="product.number" class="form-control" id="inputname21" placeholder="تعداد موجودی را وارد کنید">
                    </div>


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

                    <button class="btn btn-primary" type="button" v-on:click="edit($route.params.productID)" style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن محصول </button>
                </form>
                <div class="progress" style="margin-top: 10px">
                    <div class="progress-bar" role="progressbar" :style="'width:'+ percent + '%'" :aria-valuenow="percent" aria-valuemin="0" aria-valuemax="100">{{percent}}%</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "edit-product" ,

        created() {
            console.log("add-product-content component");
            this.get_brands();
            this.get_product(this.$route.params.productID);

        } ,

        props: ['second_categories'] ,

        data() {
            return {
                percent: 0 ,
                brands: [] ,
                main_id: '',
                files: [] ,
                title: '' ,
                description: '' ,
                imageUrl: [] ,
                price: '' ,
                brand_id: '' ,
                discount: '' ,
                number: '' ,
                img: '' ,
                category_brands: [] ,
                product: {
                    title: '' ,
                    description: '' ,
                    price: '' ,
                    discount: '' ,
                    number: '' ,
                } ,
                features: [] ,
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
                        for (let i = 0; i < this.img.length; i++)
                        {
                            this.imageUrl.push(URL.createObjectURL(this.img[i]));
                            this.files.push(this.img[i]);
                        }
                    }
                }
            } ,
            edit(id) {
                this.percent = 0;
                let data = new FormData();
                if (this.img !== '' && this.img !== null)
                {
                    for (let i = 0; i <this.files.length; i++) {
                        data.append('files[]' , this.files[i]);
                    }

                    data.append('title' , this.product.title);
                    data.append('description' , this.product.description);
                    data.append('secondary_category_id' , this.main_id.id);
                    data.append('price' , this.product.price);
                    data.append('brand_id' , this.brand_id);
                    data.append('discount' , (100 - this.discount) / 100);
                    data.append('number' , this.product.number);
                    data.append('features' , this.features);

                    axios({
                        url: `/api/product/edit/${id}` ,
                        method: 'post' ,
                        data: data ,
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('token')}`
                        } ,
                        onUploadProgress: uploadEvent => {
                            this.percent = Math.round(uploadEvent.loaded / uploadEvent.total * 100);
                        }
                    })
                        .then(res => {
                            console.log(res);
                            this.product = res.data;
                            this.$toasted.success('تغییرات با موفقیت اعمال شد' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(1500);
                        })
                        .catch(err => {
                            console.log(err.response);
                            err.response.data.forEach(error => {
                                this.$toasted.error(error  , {
                                    position: 'bottom-center' ,
                                    theme: 'bubble' ,
                                    fitToScreen: true ,
                                    className: ['your-custom-class']
                                }).goAway(4000);
                            })
                        });
                    this.brands = [];
                }
                else
                {
                    axios({
                        url: `/api/product/edit/${id}` ,
                        method: 'post' ,
                        data: {
                            title:this.product.title ,
                            description: this.product.description ,
                            secondary_category_id: this.main_id.id ,
                            price: this.product.price ,
                            brand_id: this.brand_id ,
                            discount: (100 - this.discount) / 100 ,
                            number: this.product.number ,
                            features: this.features
                        } ,
                        onUploadProgress: uploadEvent => {
                            this.percent = Math.round(uploadEvent.loaded / uploadEvent.total * 100);
                        }
                    })
                        .then(res => {
                            console.log(res);
                            this.product = res.data;
                            this.$toasted.success('تغییرات با موفقیت اعمال شد' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(1500);
                        })
                        .catch(err => {
                            console.log(err.response);
                            err.response.data.forEach(error => {
                                this.$toasted.error(error  , {
                                    position: 'bottom-center' ,
                                    theme: 'bubble' ,
                                    fitToScreen: true ,
                                    className: ['your-custom-class']
                                }).goAway(4000);
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