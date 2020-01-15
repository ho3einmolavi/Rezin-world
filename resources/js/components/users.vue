<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="user-list-page">
            <div class="user-list-manage-box">
                <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                    <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                        <div class="input-group-prepend button-name-doctor">
                            <button class="btn btn-outline-secondary" @click="search" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                        </div>
                        <input style="text-align: right;font-size: 12px;" v-model="query" @keypress.enter="search" type="text" class="form-control input-form-control" placeholder="نام خانوادگی کاربر مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 word-list flex">
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-img">
                    <span class="title-4">  نام کاربر </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-all">
                    <span class="title-4"> شماره  همراه</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-1 word-list-des">
                    <span class="title-4">   کد پستی </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-3 word-list-ads">
                    <span class="title-4"> آدرس</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-delete-details">
                    <span class="title-4" style="padding-right: 33px;">  حذف  </span>
                </div>
            </div>
            <div v-if="error === 1" class="alert alert-danger">کاربری یافت نشد</div>
            <ol v-if="error === 0" id="selectable" class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
                <li v-for="item in users" class="ui-state-default user-list-info-box flex">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                        <span class="text-span title-4"> {{item.first_name}} {{item.last_name}}</span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                        <span class="text-span title-4"> {{item.phone_number}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                        <span class="text-span title-4"> {{item.postal_code}}</span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-email">
                        <span class="text-span title-4">{{item.address}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                        <a @click="delete_user(item.id)" id="error2" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
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
        name: "users" ,

        created() {
            this.get_users();
        } ,

        data() {
            return {
                users: [] ,
                query: '' ,
                error: 0
            }
        } ,

        methods: {
            search() {
                axios({
                    url: `/api/search/users/last_name` ,
                    method: 'post' ,
                    data: {
                        q: this.query
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.error = 0;
                        this.users = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.error = 1
                    })
            } ,
            delete_user(id) {
                if (confirm('آیا از حذف کردن این کاربر مطمئن هستید؟؟؟'))
                {
                    axios({
                        url: `/api/users/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            console.log(res);
                            this.$toasted.success('user is deleted' , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true
                            }).goAway(1500);
                            this.get_users();
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$toasted.error(err.response.data , {
                                position: 'bottom-center' ,
                                theme: 'bubble' ,
                                fitToScreen: true
                            }).goAway(3000);
                        })
                }
            } ,
            get_users() {
                axios({
                    url: '/api/users' ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.users = res.data;
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