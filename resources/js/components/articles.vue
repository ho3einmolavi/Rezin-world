<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="user-list-manage-box">
            <div class="col-xs col-sm col- col-md col-lg col-xl-4 user-list-manage-box-search delete-padding">
                <div class="input-group mb-3 input-name-doctor" style="direction: ltr;width: 98%;">
                    <div class="input-group-prepend button-name-doctor">
                        <button class="btn btn-outline-secondary" @click="search" type="button" id="button-addon1"><i class="fas fa-search"></i></button>
                    </div>
                    <input style="text-align: right;font-size: 12px;" v-model="query" @keypress.enter="search" type="text" class="form-control input-form-control" placeholder="عنوان مقاله مورد نظر خود را جستجو کنید" aria-label="Example text with button addon" aria-describedby="button-addon1">
                </div>
            </div>
        </div>

        <b-alert show variant="danger" style="font-family: irs" v-if="error === 1">مقاله ای یافت نشد</b-alert>

        <div v-if="error === 0">
            <b-card
                    v-for="item in articles"
                    sub-title-tag="div"
                    :sub-title="item.date"
                    :key="item.id"
                    style="margin-bottom: 20px;font-family: irs"
                    :title="item.title"
                    title-tag="h6"
            >
                <b-card-text style="font-size: 12px">
                    {{item.body.substr(0 , 200) + '....'}}
                </b-card-text>

                <a :href="'/article/' + item.title"  class="card-link">لینک مقاله</a>
                <hr>
                <router-link :to="'/admin/update-article/' + item.id"><b-button variant="outline-primary" >ویرایش</b-button></router-link>
                <b-button variant="outline-danger" @click="delete_article(item.id)">حذف</b-button>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: "articles" ,

        data() {
            return {
                articles: [] ,
                query: '' ,
                error: 0
            }
        } ,

        created() {
            this.get_articles();
        } ,

        methods: {
            search() {
                axios({
                    url: `/api/search/articles/title` ,
                    method: 'post' ,
                    data: {
                        q: this.query
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.error = 0;
                        this.articles = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.error = 1
                    })
            } ,
            delete_article(id) {
                this.$swal.fire({
                    title: 'مطمئن هستید؟',
                    text: "این مقاله حذف شود؟",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#41b882',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'نه',
                    confirmButtonText: 'آره بابا '
                }).then((result) => {
                    axios({
                        url: `/api/articles/${id}/delete` ,
                        method: 'get' ,
                    })
                        .then(res => {
                            console.log(res);
                            if (result.value) {
                                this.$swal('پاک شد' , 'مقاله حذف شد' , 'success')
                            }
                            this.get_articles();
                        })
                        .catch(err => {
                            console.log(err.response);
                            this.$swal('ناموفق' , 'مقاله حذف شد' , 'error')
                        })
                })
            } ,
            get_articles() {
                axios({
                    url: `/api/articles` ,
                    method: 'get' ,
                })
                    .then(res => {
                        console.log(res);
                        this.articles = res.data;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            }
        }
    }
</script>

<style scoped>
    .text-muted {
        font-size: 13px;
    }
</style>