<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-xs col-sm col- col-md col-lg col-xl-8">
                <form class="needs-validation" novalidate>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputname">کد تخفیف</label>
                        <input type="text" class="form-control" v-model="name" id="inputname" placeholder="کد تخفیف را وارد کنید">
                    </div>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">این کوپن چند درصد تخفیف دارد؟</label>
                        <input type="number" class="form-control" v-model="amount" id="inputEmail4" placeholder="درصد تخفیف را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label >انقضاء</label>
                        <date-picker v-model="expire"></date-picker>
                    </div>



                    <button class="btn btn-primary" type="button" @click="addOff" style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن  کوپن</button>
                </form>
            </div>
        </div>

        <hr>

        <div class="col-xs col-sm col- col-md col-lg col-xl-12 word-list flex">
            <div class="col-xs col-sm col- col-md col-lg col-xl-1 word-list-img">
                <span class="title-4"> کد</span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-name">
                <span class="title-4">    نوع کوپن   </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-1 word-list-all">
                <span class="title-4">  درصد تخفیف  </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-1 word-list-ads">
                <span class="title-4"> شناسه  </span>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-date">
                <span class="title-4"> انقضاء</span>
            </div>
        </div>
        <ol id="selectable" class="col-md-12 delete-padding-left">
            <li  v-for="(item , index) in offs" class="ui-state-default user-list-info-box flex">
                <div class="col-md-1 user-list-info-box-image">
                    <span class="text-span title-4">  {{index + 1}} </span>
                </div>
                <div class="col-md-2 user-list-info-box-name">
                    <span class="text-span title-4">کوپن تخفیف </span>
                </div>
                <div class="col-md-1 user-list-info-box-number">
                    <span class="text-span title-4"> {{item[0].amount}}</span>
                </div>

                <div class="col-md-2 user-list-info-box-email2">
                    <span class="text-span title-4"> {{item[0].name}}</span>
                </div>
                <div class="col-md-2 user-list-info-box-email2">
                    <span class="text-span title-4"> {{item[1]}}</span>
                </div>
                <div class="col-md-2 table-data-feature flex">
                    <a v-on:click="delete_discount(item[0].id)" id="error2" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </li>
        </ol>
    </div>

</template>

<script>
    var moment = require('jalali-moment');
    export default {
        name: "add-discount" ,

        created() {
            this.get_offs();
        } ,

        data() {
            return {
                offs: [] ,
                name: '' ,
                amount: '' ,
                expire: ''
            }
        } ,

        methods: {
            addOff() {
                axios({
                    url: `/api/create/discount` ,
                    method: 'post' ,
                    data: {
                        name: this.name ,
                        amount: this.amount ,
                        expire: moment.from(this.expire, 'fa', 'YYYY/MM/DD').format('YYYY-MM-DD')
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.$toasted.success('تخفیف اضافه شد' , {
                            position: 'bottom-center' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            className: ['your-custom-class']
                        }).goAway(1500);
                        this.get_offs();
                    })
                    .catch(err => {
                        console.log(err.response);
                        err.response.data.forEach(error => {
                            this.$toasted.error(error, {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(3000);
                        })

                    })
            } ,
            delete_discount(id) {
                if (confirm('آیا از حذف کردن این تخفیف مطمئن هستید؟'))
                {
                    axios({
                        url: `/api/discounts/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            console.log(res);
                            this.$toasted.success('تخفیف حذف شد' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(1500);
                            this.get_offs();
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$toasted.error(err.response.data , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(3000);
                        })
                }
            } ,
            get_offs() {
                axios({
                    url: `/api/index/discount` ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.offs = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        } ,

    }
</script>

<style>

</style>