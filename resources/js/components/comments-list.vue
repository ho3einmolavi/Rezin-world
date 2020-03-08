<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="user-list-page">
            <div class="user-list-manage-box">
                <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                    <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                        <div class="input-group-prepend button-name-doctor">
                            <button class="btn btn-outline-secondary" @click="search" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                        </div>
                        <input style="text-align: right;font-size: 12px;" v-model="query" @keypress.enter="search" type="text" class="form-control input-form-control" placeholder="متن کامنت مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                </div>
            </div>
            <div class="col-xs col-sm col- col-md col-lg col-xl-12 word-list flex">
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-img">
                    <span class="title-4">  نام کاربر </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-6 word-list-all">
                    <span class="title-4">متن</span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-delete-details">
                    <span class="title-4" style="padding-right: 33px;">  حذف | تایید </span>
                </div>
                <div class="col-xs col-sm col- col-md col-lg col-xl-2 word-list-delete-details">
                    <span class="title-4" style="padding-right: 33px;">  وضعیت  </span>
                </div>
            </div>
            <div v-if="error === 1" class="alert alert-danger">کاربری یافت نشد</div>
            <ol v-if="error === 0" id="selectable" class="col-xs col-sm col- col-md col-lg col-xl-12 delete-padding-left">
                <li v-for="item in comments" class="ui-state-default user-list-info-box flex">
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-image">
                        <span class="text-span title-4" v-if="item.user"> {{item.user.first_name}} {{item.user.last_name}}</span>
                        <span class="text-span title-4" v-else> مهمان</span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-6 user-list-info-box-number">
                        <span class="text-span title-4"> {{item.body}} </span>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 table-data-feature flex">
                        <a @click="delete_comment(item.id)" id="error2" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                        <a @click="verifyComment(item.id)" id="erruor2" class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="حذف ">
                                <i class="fas fa-check-circle"></i>
                        </a>
                    </div>
                    <div class="col-xs col-sm col- col-md col-lg col-xl-2 user-list-info-box-number">
                        <span class="text-span title-4" v-if="item.verify" style="background-color: #ff7a76 "> تایید شده</span>
                        <span class="text-span title-4" v-else> تایید نشده</span>
                    </div>
                </li>
            </ol>
        </div>
    </div>
</template>

<script>
    export default {
        name: "comments-list" ,

        created() {
            this.get_comments();
        } ,

        data() {
            return {
                comments: [] ,
                error: '' ,
                query: ''
            }
        } ,

        methods: {
            verifyComment(id) {
                axios({
                    url: `/api/comment/verify/${id}` ,
                    method: 'get' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.get_comments();
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            search() {
                axios({
                    url: `/api/search/comments/body` ,
                    method: 'post' ,
                    data: {
                        q: this.query
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.error = 0;
                        this.comments = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.error = 1
                    })
            } ,
            delete_comment(id) {
                this.$swal.fire({
                    title: 'مطمئن هستید؟',
                    text: "این کامنت حذف شود؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#41b882',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'نه',
                    confirmButtonText: 'آره بابا '
                }).then((result) => {
                    axios({
                        url: `/api/comments/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            console.log(res);
                            if (result.value) {
                                this.$swal('پاک شد' , 'کامنت حذف شد' , 'success')
                            }
                            this.get_comments();
                        })
                        .catch(err => {
                            console.log(err.response);
                        })
                })
            } ,
            get_comments() {
                axios({
                    url: `/api/allComments` ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.error = 0;
                        this.comments = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        }
    }
</script>

<style scoped>
    .swal2-popup {
        font-family: irs;
    }
</style>