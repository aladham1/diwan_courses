<template>
    <form id="kt_modal_add_user_form" class="form " method="post"
          action="" @submit.prevent="onSubmit"
          @keydown="form.errors.clear($event.target.name)">
        <div class="d-flex flex-column scroll-y me-n7 pe-7">
            <div class="row mb-10">
                <div class="col-md-6">
                    <label class="fs-5 fw-bolder form-label mb-2">
                        <span class="required">الموظفين</span>
                    </label>
                    <select class="form-select" v-model="form.users" multiple
                            v-select="form.users"
                            name="standard_id"
                            data-control="select2" data-placeholder="اختر الموظفين" data-allow-clear="true">
                        <option v-for="user in users" :value="user.id">{{ user.name }}</option>
                    </select>
                    <span v-if="form.errors.has('users')"
                          class="fv-plugins-message-container invalid-feedback"
                          v-text="form.errors.get('users')"></span>
                </div>
                <div class="col-md-6">
                    <label class="fs-5 fw-bolder form-label mb-2">
                        <span class="required">العنوان </span>
                    </label>
                    <input class="form-control form-control-solid" v-model="form.title" placeholder="العنوان"
                           name="title"/>
                    <span v-if="form.errors.has('title')"
                          class="fv-plugins-message-container invalid-feedback"
                          v-text="form.errors.get('title')"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column me-n7 pe-7">
                        <div class="form-floating mb-7">
                            <input v-model="form.start_at" name="start_at" class="form-control date" id="start_at"
                                   placeholder="تاريخ البداية"/>
                            <label for="start_at">تاريخ البداية</label>
                            <span v-if="form.errors.has('start_at')"
                                  class="fv-plugins-message-container invalid-feedback"
                                  v-text="form.errors.get('start_at')"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column me-n7 pe-7">
                        <div class="form-floating mb-7">
                            <input v-model="form.end_at" name="end_at" class="form-control date" id="end_at"
                                   placeholder="تاريخ النهاية"/>
                            <label for="end_at">تاريخ النهاية</label>
                            <span v-if="form.errors.has('end_at')"
                                  class="fv-plugins-message-container invalid-feedback"
                                  v-text="form.errors.get('end_at')"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label class="fs-5 fw-bolder form-label mb-2">
                        <span class="required">عدد ساعات الدورة </span>
                    </label>
                    <input type="number" class="form-control form-control-solid" v-model="form.hours" placeholder="عدد ساعات الدورة "
                           name="hours"/>
                    <span v-if="form.errors.has('hours')"
                          class="fv-plugins-message-container invalid-feedback"
                          v-text="form.errors.get('hours')"></span>
                </div>
            </div>
        </div>
        <div class="text-center pt-15">
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">اضافة</span>
                <span class="" v-if="postProgress">انتظر ...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>

</template>

<script>

import vue2Dropzone from "vue2-dropzone";

export default {
    name: "NewCourse",
    props: ['csrf'],
    data() {
        return {
            users: [],
            form: new Form({
                title: '',
                hours: '',
                start_at: '',
                end_at: '',
                users: []
            }),
            'postProgress': false,
        }
    },
    mounted() {
        axios.get(url_site + 'get-users?all=yes')
            .then((response) => {
                this.users = response.data;
            }).catch(error => {
        });
    },
    methods: {

        onSubmit() {
            var redirect_url = url_site + 'courses';
            this.postProgress = true;
            this.form.post(url_site + 'courses')
                .then(response => Swal.fire({
                    text: "تمت الاضافة بنجاح",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "موافق",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                }).then(function () {
                    window.location = redirect_url;
                })).catch(error => {
                this.swalErrorMessage();
            })
            this.postProgress = false;
        },
        swalErrorMessage() {
            Swal.fire({
                text: "حدث خطأ ما، يرجى المحاولة فما بعد!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "حسناً",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
        },
    },
}
</script>

<style scoped>

</style>
