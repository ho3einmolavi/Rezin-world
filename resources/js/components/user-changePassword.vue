<template>
    <div class="col-xs col-sm col-9 col-md-9 col-lg-9 col-xl-9 delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="line-div-dashed-margin-right"></div>
            <div class="information-page-content-inside">
                <div class="col-md-7">
                    <form>
                        <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                            <label for="inputEmail4"> کلمه عبور فعلی </label>
                            <input type="password" class="form-control" id="inputname" v-model="old" placeholder=" کلمه عبور فعلی  را وارد کنید">
                        </div>
                        <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                            <label for="inputEmail4"> کلمه عبور جدید </label>
                            <input type="password" pattern="[A-Za-z0-9]+" class="form-control" id="inputname" v-model="new1" placeholder=" کلمه عبور جدید  را وارد کنید">
                        </div>
                        <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                            <label for="inputEmail4"> کلمه عبور جدید </label>
                            <input type="password" @keypress.enter="changePassword" pattern="[A-Za-z0-9]+" class="form-control" id="inputname" v-model="confirm" placeholder=" کلمه عبور جدید  را وارد کنید">
                        </div>
                        <div class="inside-page-input margin-bottom">
                            <a @click="changePassword" style="cursor: pointer"><span class="text-span">  ذخیره تغییرات  </span></a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "user-changePassword" ,
        data() {
            return {
                old: '' ,
                new1: '' ,
                confirm: '' ,
            }
        } ,

        methods: {
            changePassword() {
                axios({
                    url: '/api/changePassword' ,
                    method: 'post' ,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    } ,
                    data: {
                        old: this.old ,
                        new: this.new1 ,
                        confirm: this.confirm
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.$toasted.success('تغییرات با موفقیت اعمال شد' , {
                            position: 'bottom-center' ,
                            theme: 'bubble' ,
                            fitToScreen: true ,
                            className: ['your-custom-class']
                        }).goAway(1500);
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
            }
        }
    }
</script>

<style scoped>

</style>