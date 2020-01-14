<template>
    <div class="col-xs col-sm col-10 col-md-11 col-lg col-xl-9 users-main delete-padding-left">
        <div class="ui-state-default user-list-info-box-add">
            <div class="admin-form col-md-8">
                <form class="needs-validation" novalidate>

                    <div class="form-group col-xs col-sm col- col-md col-lg col-xl-12">
                        <label for="inputEmail4">نام محصول</label>
                        <input type="text" class="form-control" id="inputname" placeholder="نام محصول را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputEmail4">توضیحات محصول</label>
                        <textarea class="form-control" id="validationTextarea" placeholder="توضیحات محصول را وارد کنید" required=""></textarea>
                        <div class="invalid-feedback">
                            لطفا توضیحات محصول را وارد کنید
                        </div>
                    </div>

                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputState">دسته بندی محصول</label>
                        <select id="inputState" class="form-control form-option select-size">
                            <option selected="" class="opti">دسته بندی محصول را انتخاب کنید</option>
                            <option>لبنیات</option>
                            <option>پاشنی</option>
                            <option>غلات</option>
                        </select>
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputState">برند محصول را انتخاب کنید</label>
                        <select id="inputState" class="form-control form-option select-size">
                            <option selected="" class="opti">برند محصول را انتخاب کنید</option>
                            <option>لبنیات</option>
                            <option>پاشنی</option>
                            <option>غلات</option>
                        </select>
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputEmail4">قیمت</label>
                        <input type="text" class="form-control" id="inputname" placeholder="قیمت محصول را وارد کنید">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputEmail4">تخفیف</label>
                        <input type="text" class="form-control" id="inputname" placeholder="تخفیف">
                    </div>
                    <div class="form-group col-xs col-sm col-10 col-md col-lg col-xl-12">
                        <label for="inputEmail4">تعداد موجودی </label>
                        <input type="text" class="form-control" id="inputname" placeholder="تعداد موجودی را وارد کنید">
                    </div>


                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile" style="margin-right: 15px;margin-top: 10px;">انتخاب عکس</label>
                    </div>

                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;font-size: 13px;margin-right: 20px;"> افزودن محصول </button>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "add-products"
    }
</script>

<style scoped>

</style>