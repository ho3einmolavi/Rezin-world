<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg-9 col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-md-8">
                <form class="needs-validation" novalidate>
                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">کد</label>
                        <input type="text" class="form-control" id="inputname" placeholder="کد را وارد کنید">
                    </div>

                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputState">نوع کوپن</label>
                        <select id="inputState" class="form-control form-option select-size">
                            <option selected="" class="opti">نوع کوپن را انتخاب کنید</option>
                            <option>لبنیات</option>
                            <option>پاشنی</option>
                            <option>غلات</option>
                        </select>
                    </div>


                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">مبلغ کوپن</label>
                        <input type="text" class="form-control" id="inputname" placeholder="میلغ کوپن را وارد کنید">
                    </div>
                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">توضیحات محصول</label>
                        <textarea class="form-control" id="validationTextarea" placeholder="توضیحات محصول را وارد کنید" required=""></textarea>
                        <div class="invalid-feedback">
                            لطفا توضیحات  دسته را واد کنید
                        </div>
                    </div>
                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">شناسه ی محصول</label>
                        <input type="text" class="form-control" id="inputname" placeholder="شناسه ی محصول را وارد کنید">
                    </div>

                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">مصرف / محدودیت</label>
                        <input type="text" class="form-control" id="inputname" placeholder="مصرف و محدودیت را وارد کنید">
                    </div>


                    <div class="form-group
col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">تاریخ انقضاء</label>
                        <input type="text" class="form-control" id="inputname" placeholder="تاریخ انقضاء را وارد کنید">
                    </div>


                    <button class="btn btn-primary" type="submit" style="margin-top: 20px;font-size: 13px;margin-right: 20px;"> افزودن کوپن  </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "add-discount"
    }
</script>

<style scoped>

</style>