<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form
col-xs col-sm col- col-md col-lg col-xl-8">
                <form class="needs-validation" novalidate>

                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">نام  دسته بندی </label>
                        <input type="text" class="form-control" id="inputname" placeholder="نام دسته بندی را وارد کنید">
                    </div>
                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">نام  دسته بندی </label>
                        <textarea class="form-control" id="validationTextarea" placeholder="توضیح دسته بندی را وارد کنید" required></textarea>
                        <div class="invalid-feedback">
                            لطفا توضیحات  دسته را واد کنید
                        </div>
                    </div>




                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputState">دسته بندی محصول را انتخاب کنید</label>
                        <select id="inputState" class="form-control form-option select-size">
                            <option selected="" class="opti">دسته بندی محصول را انتخاب کنید</option>
                            <option>لبنیات</option>
                            <option>پاشنی</option>
                            <option>غلات</option>
                        </select>
                    </div>




                    <div class="custom-file" style="margin-top: 25px;margin-right: 15px;">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">انتخاب عکس</label>
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin-top: 20px;font-size: 13px;margin-right: 15px;"> افزودن دسته</button>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "add-category"
    }
</script>

<style scoped>

</style>