<template>
    <div class="col-xs col-sm col- col-md col-lg col-xl-9 all-category-image delete-padding">
        <h6 style="margin: 10px">بنر صفحه محصولات</h6>
        <div @click="edit(p_baner.id)" class="col-xs col-sm col- col-md col-lg col-xl-12 product-image">
            <img :src="'/img/product-images/' + p_baner.image" class="img-fluid" alt="Responsive image">
        </div>
        <hr>

        <h6 style="margin: 10px">بنر های صفحه اصلی</h6>
        <div @click="edit(baners[0].id)" class="col-xs col-sm col- col-md col-lg col-xl-12 category-full">
            <img :src="'/img/product-images/' + baners[0].image" class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-images delete-padding">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-images-start flex delete-padding">
                <div @click="edit(baners[1].id)" class="col-xs col-sm col- col-md col-lg col-xl-4 g-img-start-right">
                    <a href="#"><img :src="'/img/product-images/' + baners[1].image" class="image-size-small img-fluid" alt="Responsive image"></a>
                </div>
                <div @click="edit(baners[2].id)" class="col-xs col-sm col- col-md col-lg col-xl-4 g-img-start-beetween">
                    <a href="#"><img :src="'/img/product-images/' + baners[2].image" class="image-size-small img-fluid" alt="Responsive image"></a>
                </div>
                <div @click="edit(baners[3].id)" class="col-xs col-sm col- col-md col-lg col-xl-4 g-img-start-left">
                    <a href="#"><img :src="'/img/product-images/' + baners[3].image" class="image-size-small img-fluid" alt="Responsive image"></a>
                </div>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-images-end flex delete-padding">
                <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-images-start flex delete-padding">
                    <div @click="edit(baners[4].id)" class="col-xs col-sm col- col-md col-lg col-xl-4 g-img-start-right">
                        <a href="#"><img :src="'/img/product-images/' + baners[4].image" class="image-size-small img-fluid" alt="Responsive image"></a>
                    </div>
                    <div @click="edit(baners[5].id)" class="col-xs col-sm col- col-md col-lg col-xl-4 g-img-start-beetween">
                        <a href="#"><img :src="'/img/product-images/' + baners[5].image" class="image-size-small img-fluid" alt="Responsive image"></a>
                    </div>
                    <div @click="edit(baners[6].id)" class="col-xs col-sm col- col-md col-lg col-xl-4 g-img-start-left">
                        <a href="#"><img :src="'/img/product-images/' + baners[6].image" class="image-size-small img-fluid" alt="Responsive image"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-offer delete-padding">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-offer-start flex">
                <div @click="edit(baners[7].id)" class="col-xs col-sm col- col-md col-lg col-xl-3 gallery-offer-img1 delete-padding">
                    <a href="#"><img :src="'/img/product-images/' + baners[7].image" class="img-fluid" alt="Responsive image"></a>
                </div>
                <div @click="edit(baners[8].id)" class="col-xs col-sm col- col-md col-lg col-xl-3 gallery-offer-img2 delete-padding" alt="Responsive image">
                    <a href="#"><img :src="'/img/product-images/' + baners[8].image" class="img-fluid" alt="Responsive image"></a>
                </div>
                <div @click="edit(baners[9].id)" class="col-xs col-sm col- col-md col-lg col-xl-3 gallery-offer-img3 delete-padding">
                    <a href="#"><img :src="'/img/product-images/' + baners[9].image" class="img-fluid" alt="Responsive image"></a>
                </div>
                <div @click="edit(baners[10].id)" class="col-xs col-sm col- col-md col-lg col-xl-3 gallery-offer-img4 delete-padding">
                    <a href="#"><img :src="'/img/product-images/' + baners[10].image" class="img-fluid" alt="Responsive image"></a>
                </div>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 gallery-offer-end flex">
                <div @click="edit(baners[11].id)" class="col-xs col-sm col- col-md col-lg col-xl-6 gallery-offer-right delete-padding">
                    <a href="#"><img :src="'/img/product-images/' + baners[11].image" class="img-fluid" alt="Responsive image"></a>
                </div>
                <div @click="edit(baners[12].id)" class="col-xs col-sm col- col-md col-lg col-xl-6 gallery-offer-left delete-padding">
                    <a href="#"><img :src="'/img/product-images/' + baners[12].image" class="img-fluid" alt="Responsive image"></a>
                </div>
            </div>
        </div>
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 all-category-important table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 all-category-important-image flex">
                <div class="card-indeex col-xs col-sm col- col-md col-lg col-xl-3">
                    <div @click="edit(baners[13].id)" class="card card-second">
                        <img :src="'/img/product-images/' + baners[13].image">
                        <div class="card--hidden"></div>
                        <div class="card__content">
                            <h2>لبنیات</h2>
                            <p>شیر و پنیر</p>
                            <a href="#" class="card__info">50% تخفیف</a>
                        </div>
                    </div>
                </div>

                <div class="col-xs col-sm col- col-md col-lg col-xl-3">
                    <div @click="edit(baners[14].id)" class="card card-second">
                        <img :src="'/img/product-images/' + baners[14].image">
                        <div class="card--hidden"></div>
                        <div class="card__content">
                            <h2>خشکبار</h2>
                            <p>گردو و پسته</p>
                            <a href="#" class="card__info">50% تخفیف</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-3">
                    <div @click="edit(baners[15].id)" class="card card-second">
                        <img :src="'/img/product-images/' + baners[15].image">
                        <div class="card--hidden"></div>
                        <div class="card__content">
                            <h2>حبوبات</h2>
                            <p>نخود و لوبیا</p>
                            <a href="#" class="card__info">50% تخفیف</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-3">
                    <div @click="edit(baners[16].id)" class="card card-second">
                        <img :src="'/img/product-images/' + baners[16].image">
                        <div class="card--hidden"></div>
                        <div class="card__content">
                            <h2>قند  شکر</h2>
                            <p>نبات و شکر</p>
                            <a href="#" class="card__info">50% تخفیف</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "edit-baners" ,


        created() {
            this.get_baners();
        } ,

        data() {
            return {
                baners: [] ,
                pic: '' ,
                link: '' ,
                p_baner: '' ,
                percent: 0
            }
        } ,

        methods: {
            handle() {
                this.pic = document.getElementById('banerID').files[0];
                if (!this.pic)
                {
                    this.pic = ''
                }

                this.link = document.getElementById('banerID1').value;
            } ,
            edit(id) {
                this.percent = 0;
                var div = document.createElement("div");
                div.innerHTML = `
                    <input type="file" id="banerID">
                    <input type="text" id="banerID1">
                `;
                swal({
                    content: {
                        element: div,
                    },
                    className: 'your-custom-class' ,
                    title: 'بنر جدید را انتخاب کنید' ,
                    bottom: {
                        closeModal: false
                    }
                })
                    .then(name => {
                        this.handle();
                        let data = new FormData();
                        data.append('image' , this.pic);
                        data.append('link' , this.link);
                        console.log(this.pic);
                        swal({
                            title: 'در حال آپلود' ,
                            text: ' لطفا منتظر بمانید ...' ,
                            className: 'your-custom-class' ,
                            icon: 'warning'
                        });
                        axios({
                            url: `/api/update/baner/${id}` ,
                            method: 'post' ,
                            data: data ,
                            onUploadProgress: uploadEvent => {
                                this.percent = Math.round(uploadEvent.loaded / uploadEvent.total * 100);
                            }
                        })
                            .then(res => {
                                console.log(res);
                                swal('تغییرات با موفقیت اعمال شد' , 'بنر ویرایش شد' , 'success' , {
                                    className: 'your-custom-class'
                                });
                                this.get_baners();
                            })
                            .catch(err => {
                                console.log(err.response);
                                swal('error' , 'an error occurred please check the console' , 'error' ,{
                                    className: 'your-custom-class'
                                })
                            })
                    })
                    .catch(err => {
                        swal('error' , 'an error occurred please check the console' , 'error' ,{
                            className: 'your-custom-class'
                        })
                    })
            } ,
            get_baners() {
                axios({
                    url: '/api/baners' ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.baners = res.data.main_baners;
                        this.p_baner = res.data.products_baner;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
        }
    }
</script>

<style scoped>

</style>