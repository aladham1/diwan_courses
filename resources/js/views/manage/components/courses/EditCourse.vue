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
                <div class="col-md-6">
                    <label class="fs-5 fw-bolder form-label mb-2">
                        <span class="required">اسم المدرب </span>
                    </label>
                    <input type="text" class="form-control form-control-solid" v-model="form.trainer_name" placeholder="اسم المدرب "
                           name="trainer_name"/>
                    <span v-if="form.errors.has('trainer_name')"
                          class="fv-plugins-message-container invalid-feedback"
                          v-text="form.errors.get('trainer_name')"></span>
                </div>
                <div class="col-md-6">
                    <label class="fs-5 fw-bolder form-label mb-2">
                        <span class="required">عدد ساعات الدورة </span>
                    </label>
                    <input type="number" class="form-control form-control-solid" v-model="form.hours"
                           placeholder="عدد ساعات الدورة "
                           name="hours"/>
                    <span v-if="form.errors.has('hours')"
                          class="fv-plugins-message-container invalid-feedback"
                          v-text="form.errors.get('hours')"></span>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-center fw-bolder mt-3 mt-md-0">
                        <label class="form-check form-check-sm form-check-custom form-check-solid ms-5">
                            <input class="form-check-input checkbox-column" v-model="form.is_active"
                                   type="checkbox" value="true" name="ready"/>
                            <span class="form-check-label" style="font-weight: normal">فعالة</span>
                        </label>
                    </div>
                </div>
            </div>


        </div>
        <div class="text-center pt-15">
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">حفظ</span>
                <span class="" v-if="postProgress">انتظر ...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
        </div>
    </form>
</template>

<script>


import moment from "moment/moment";

export default {
    name: "EditCourse",
    props: ['csrf', 'course'],
    data() {
        return {
            users: [],
            form: new Form({
                title: this.course.title,
                hours: this.course.hours,
                trainer_name: this.course.trainer_name,
                start_at: moment(this.course.start_at).format("Y-M-D"),
                end_at: moment(this.course.end_at).format("Y-M-D"),
                is_active: this.course.is_active,
                users: this.course.users.map(e => e.id),
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
    filters: {
        date(value) {
            return moment(value).locale("ar").format("Y-m-d");
        },
    },
    methods: {
        onSubmit() {
            this.postProgress = true;
            this.form.put(url_site + 'courses/' + this.course.id)
                .then(response => Swal.fire({
                    text: "تمت التعديل بنجاح",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "موافق",
                    customClass: {
                        confirmButton: "btn fw-bold btn-primary"
                    }
                }).then(function () {
                    window.location = url_site + 'courses';
                })).catch(error => {
                this.swalErrorMessage();
            })
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
