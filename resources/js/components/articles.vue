<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div >
            <b-card v-for="item in articles" style="margin-bottom: 20px" :title="item.title" >
                <b-card-text>
                    {{item.body.substr(0 , 200)}}
                </b-card-text>

                <a :href="'/article/' + item.title"  class="card-link">لینک مقاله</a>
                <!--<b-link href="#" class="card-link">Another link</b-link>-->
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