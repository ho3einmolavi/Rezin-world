<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div >
            <b-card v-for="item in articles" :key="item.id" style="margin-bottom: 20px;font-family: irs" :title="item.title" title-tag="h6" >
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
                articles: []
            }
        } ,

        created() {
            this.get_articles();
        } ,

        methods: {
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
                                this.$swal('پاک شد' , 'کامنت حذف شد' , 'success')
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

</style>