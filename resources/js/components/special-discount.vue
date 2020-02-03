<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-xs col-sm col- col-md col-lg col-xl-8">
                <form class="needs-validation" novalidate>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputname">میخواهید چند تومان تخفیف دهید؟</label>
                        <input type="number" class="form-control" v-model="amount"  id="inputname" placeholder="مقدار تخفیف را وارد کنید">
                    </div>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">محدودیت تخفیف چقدر است؟ (برای مثال برای سفارش های بالای 100 هزار تومن)</label>
                        <input type="number" class="form-control" v-model="limit" id="inputEmail4" placeholder="مقدار تخفیف را به تومان وارد کنید">
                    </div>

                    <button class="btn btn-primary" @click="addDiscount" type="button"  style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن  کوپن</button>
                </form>
                <!--<div class="table-table-right col-xs col col-sm- col-md col-lg col-xl-8" style="margin-top:20px;">-->
                    <!--<table class="table table-bordered table-transation table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">-->
                        <!--<thead>-->
                        <!--<tr>-->
                            <!--<th scope="col" class="title-4">ردیف</th>-->
                            <!--<th scope="col" class="title-4"> مقدار تخفیف </th>-->
                            <!--<th scope="col" class="title-4"> برای سفارش های بالای ... </th>-->
                            <!--<th scope="col" class="title-4"> حذف </th>-->
                        <!--</tr>-->
                        <!--</thead>-->
                        <!--<tbody>-->
                        <!--<tr v-for="(item , index) in offs">-->
                            <!--<th scope="row">{{index + 1}}</th>-->
                            <!--<td class="title-4">{{item.amount}}</td>-->
                            <!--<td class="title-4"> {{item.limit}}</td>-->
                            <!--<td v-on:click="delete_discount(item.id)" class="title-4"><i class="fas fa-trash-alt"></i></td>-->
                            <!--<td class="title-4" style="background-color: #0ac282; color: white; " v-if="index === 0"> فعال</td>-->
                        <!--</tr>-->
                        <!--</tbody>-->
                    <!--</table>-->
                <!--</div>-->

            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 word-list flex">
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-img">
                    <span class="title-4"> ردیف</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-all">
                    <span class="title-4"> مقدار تخفیف (تومان)  </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-ads">
                    <span class="title-4"> برای سفارش های بالای ... (تومان)  </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-date">
                    <span class="title-4"> حذف</span>
                </div>
            </div>
            <ol id="selectable" class="col-md-12 delete-padding-left">
                <li  v-for="(item , index) in offs" style="border-radius: 10px;margin-bottom: 30px" class="ui-state-default user-list-info-box flex">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                        <span class="text-span title-4 ">  {{index + 1}} </span>
                    </div>

                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                        <span class="text-span title-4 "> {{item.amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}</span>
                    </div>

                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-email2">
                        <span class="text-span title-4 ">  {{item.limit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}}</span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                        <a v-on:click="delete_discount(item.id)" id="error2" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                    <div v-if="index === 0" style="background-color: #1b73f4; border-radius: 20px" class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-email2">
                        <span class="text-span title-4 text-white ">فعال</span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>

<script>
    export default {
        name: "special-discount" ,

        created() {
            this.get_discounts();
        } ,

        data() {
            return {
                amount: '' ,
                limit: '' ,
                offs: []
            }
        } ,

        methods: {
            addDiscount() {
                axios({
                    url: '/api/create/special_discount' ,
                    method: 'post' ,
                    data: {
                        amount: this.amount ,
                        limit: this.limit
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.get_discounts();
                        this.$toasted.success(res.data , {
                            position: 'bottom-center' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            className: ['your-custom-class']
                        }).goAway(2000);
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
            delete_discount(id) {
                if (confirm('آیا از حذف کردن این تخفیف مطمئن هستید؟'))
                {
                    axios({
                        url: `/api/special_discounts/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            console.log(res);
                            this.$toasted.success('تخفیف حذف شد' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true ,
                                className: ['your-custom-class']
                            }).goAway(2000);
                            this.get_discounts();
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
            get_discounts() {
                axios({
                    url: '/api/index/special_discount' ,
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
        }

    }
</script>

<style scoped>

</style>