<template>
    <form  class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-8 users-main delete-padding-left">
        <div v-if="ok">
            <b-progress :value="percent" max="100" show-progress animated></b-progress>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">عنوان مقاله</label>
            <input type="text" class="form-control" v-model="title" id="exampleFormControlInput1" placeholder="عنوان مقاله را وارد کنید">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">متن مقاله</label>
            <textarea class="form-control" v-model="body" placeholder="متن مقاله را وارد کنید" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>

        <div>
            <label for="exampleFormControlFile1">کاور مقاله</label>
            <input type="file" class="form-control-file" ref="cover" @change="handle()" id="exampleFormControlFile1">
        </div>

        <div style="margin-top: 20px">
            <b-form-tags
                    v-model="keywords"
                    tag-variant="primary"
                    tag-pills
                    size="lg"
                    separator=" "
                    placeholder="تگ را وارد کنید و با دکمه enter آن‌ها را از هم جدا نمایید"
                    class="mb-2"
                    add-button-text="اضافه"
            ></b-form-tags>
            <!--<p>Value: {{ keywords }}</p>-->
        </div>

        <div class="form-group" style="font-family: irs">
            <b-button @click="update_and_show_article(1 , $route.params.articleID)" variant="outline-primary">ویرایش</b-button>
        </div>
    </form>
</template>

<script>
    export default {
        name: "edit-article" ,
        data() {
            return {
                title: '' ,
                body: '' ,
                cover: '' ,
                keywords: [] ,
                percent: 0 ,
                ok: 0
            }
        } ,
        created() {
            this.update_and_show_article(0 , this.$route.params.articleID);
        } ,
        methods: {
            handle() {
                this.cover = this.$refs.cover.files[0];
            } ,

            update_and_show_article(flag , id) {
                this.percent = 0;
                this.ok = 1;
                if (flag === 1)
                {
                    let data = new FormData();
                    data.append('title' , this.title);
                    data.append('body' , this.body);
                    data.append('cover' , this.cover);
                    data.append('keywords' , this.keywords.join(','));
                    axios({
                        url: `/api/article/${id}` ,
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
                            this.$swal({
                                title: 'success' ,
                                text: 'the article is update successfully' ,
                                icon: 'success'
                            });
                            this.update_and_show_article(0 , id);
                        })
                        .catch(err => {
                            console.log(err.response);
                            err.response.data.forEach(item => {
                                this.$toasted.error(item.toString() , {
                                    position: 'bottom-center' ,
                                    theme: 'bubble' ,
                                    fitToScreen: true ,
                                    className: ['your-custom-class']
                                }).goAway(3000);
                            });
                        })
                }
                else
                {
                    axios({
                        url: `/api/article/${id}` ,
                        method: 'post' ,
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('token')}`
                        } ,
                        onUploadProgress: uploadEvent => {
                            this.percent = Math.round(uploadEvent.loaded / uploadEvent.total * 100);
                        }
                    })
                        .then(res => {
                            console.log(res);
                            this.title = res.data.title;
                            this.body = res.data.body;
                            this.keywords = res.data.keywords.split(',');
                        })
                        .catch(err => {
                            console.log(err.response);
                            err.response.data.forEach(item => {
                                this.$toasted.error(item.toString() , {
                                    position: 'bottom-center' ,
                                    theme: 'bubble' ,
                                    fitToScreen: true ,
                                    className: ['your-custom-class']
                                }).goAway(3000);
                            });
                        })
                }

            }
        }
    }
</script>

<style scoped>

</style>