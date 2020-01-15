<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 contentt">
        <ol class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
            <li class="ui-state-default user-list-info-box flex" v-for="cat in cats" style="border-radius: 10px">
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                    <img :src="'/images/category/' + cat.img">
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-name">
                    <span class="text-span text-gray-p">  {{cat.name}} </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                    <span class="text-span text-gray-p"> دسته بندی اصلی </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-info-box-email">
                    <span class="text-span text-gray-p"> توضیحات توضیحات توضیحات  توضیحات توضیحات</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                    <a @click="click1(cat.id)" class="item confirm tablinks" data-toggle="tooltip" data-placement="top" title="" data-original-title="تایید">
                        <i class="fas fa-arrows-alt-h"></i>
                    </a>
                    <a class="item delete" @click="delete_main('main_categories' , cat.id)" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </li>
        </ol>
        <!---2-->
        <div v-if="click" class="col-xs col-sm col- col-md col-lg col-xl-12 tabcontent inside-product-box-end">
            <ol class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
                <li v-for="item in cats1" class="ui-state-default user-list-info-box flex" style="background-color: #ff7a76;border-radius: 10px ">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                        <img :src="'/images/category/' + item.img">
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-name">
                        <span class="text-span text-white"> {{item.name}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                        <span class="text-span text-white"> دسته بندی دوم </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-info-box-email">
                        <span class="text-span text-white"> توضیحات توضیحات توضیحات  توضیحات توضیحات</span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                        <a id="error2" @click="delete_main('secondary_categories' , item.id)" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </li>
            </ol>

        </div>
    </div>
</template>

<script>
    export default {
        name: "category-list-content" ,
        created() {
            console.log('category-list-content component');
            this.get_cats();
        } ,

        data() {
            return {
                query: ''  ,
                ok: '' ,
                cats: [] ,
                click: false ,
                cats1: []
            }
        } ,

        methods: {
            click1(id) {
                this.cats1 = [];
                this.click = true;
                this.cats.forEach(cat => {
                    if (cat.id === id)
                    {
                        cat.second.forEach(item => {
                            this.cats1.push(item);
                        })
                    }
                });
            } ,
            get_cats() {
                axios({
                    url: `/api/menu` ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.ok = 1;
                        this.cats = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.ok = 0;
                    })
            } ,

            delete_main(param ,id) {
                if (confirm('آیا از حذف کردن این دسته بندی مطمئن هستید؟؟؟'))
                {
                    axios({
                        url: `/api/${param}/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            this.$toasted.success('دسته بندی حذف شد' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(2000);
                            this.get_cats();
                            this.click1()
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$toasted.error('error' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(3000);
                        })
                }
            } ,
        }
    }
</script>

<style scoped>

    .collapsible {
        cursor: pointer;
        padding: px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }



    .contentt {
        display: block;
        overflow: hidden;
    }


    .inside-product-box-end{
        background-color:;
        height: auto;
        display: block;
    }
</style>