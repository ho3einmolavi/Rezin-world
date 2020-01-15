<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-8-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-xs col-sm col- col-md col-lg col-xl-8">
                <form class="needs-validation" novalidate>


                    <div class="custom-file" style="margin-top: 25px;margin-right:15px;">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">انتخاب عکس  اول</label>
                    </div>
                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12" style="margin-top: 10px;">
                        <label for="inputEmail4">لینک اولین اسلاید را وارد کنید</label>
                        <input type="text" class="form-control" id="inputname" placeholder="لینک اولین اسلاید را وارد کنید">
                    </div>

                    <div class="custom-file" style="margin-top: 25px;margin-right: 15px;">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">انتخاب عکس  دوم</label>
                    </div>
                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12" style="margin-top: 10px;">
                        <label for="inputEmail4">لینک دومین اسلاید را وارد کنید</label>
                        <input type="text" class="form-control" id="inputname" placeholder="لینک دومین اسلاید را وارد کنید">
                    </div>

                    <div class="custom-file" style="margin-top: 25px;margin-right: 15px;">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">انتخاب عکس  سوم</label>
                    </div>
                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12" style="margin-top: 10px;">
                        <label for="inputEmail4">لینک سومین اسلاید را وارد کنید</label>
                        <input type="text" class="form-control" id="inputname" placeholder="لینک سومین اسلاید را وارد کنید">
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin-top:10px;font-size: 13px;margin-right: 20px;"> افزودن اسلاید </button>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "add-slide-show"
    }
</script>

<style scoped>

</style>