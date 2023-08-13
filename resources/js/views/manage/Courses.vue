<template>
    <div>
        <div class="card">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                              height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                              fill="black"></rect>
														<path
                                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                            fill="black"></path>
													</svg>
												</span>
                        <input type="text"
                               v-model="searchQuery" @keyup="search"
                               class="form-control form-control-solid w-250px ps-14"
                               placeholder="بحث">
                    </div>
                </div>
                <div class="card-toolbar"></div>
            </div>
            <div class="card-body pt-0">
                <div class="velmld-overlay" v-if="loading"
                     style="background-color: rgba(255, 255, 255, 0.7);/* display: none; */">
                    <div class="velmld-spinner">
                        <svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px"
                             viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve"><path opacity="0.2" fill="#00dd99" d="M20.201,5.169c-8.254,0-14.946,6.692-14.946,14.946c0,8.255,6.692,14.946,14.946,14.946
    s14.946-6.691,14.946-14.946C35.146,11.861,28.455,5.169,20.201,5.169z M20.201,31.749c-6.425,0-11.634-5.208-11.634-11.634
    c0-6.425,5.209-11.634,11.634-11.634c6.425,0,11.633,5.209,11.633,11.634C31.834,26.541,26.626,31.749,20.201,31.749z"></path>
                            <path
                                fill="#00dd99" d="M26.013,10.047l1.654-2.866c-2.198-1.272-4.743-2.012-7.466-2.012h0v3.312h0
    C22.32,8.481,24.301,9.057,26.013,10.047z"><animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 20 20" to="360 20 20" dur="0.6s" repeatCount="indefinite"></animateTransform></path></svg>
                        <!----></div>
                </div>
                <div class="table-responsive">
                    <table id="kt_datatable_example_1" class="table table-row-bordered gy-5"
                           style=" white-space: nowrap;">
                        <thead>
                        <tr class="fw-bold fs-6 text-muted">
                            <th>#</th>
                            <th>الدورة</th>
                            <th v-if="can_edit || can_delete">المشتركين</th>
                            <th>نموذج التقييم</th>
                            <th>تاريخ البداية</th>
                            <th>تاريخ النهاية</th>
                            <th>عدد الساعات</th>
                            <th>المدرب</th>
                            <th>حالة الدورة</th>
                            <th class="text-center" v-if="can_edit || can_delete">العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(course, index) in courses.data">
                            <td>
                                <a :href="`courses/`  + course.id ">
                                    {{ (current_page * 15) - 15 + index + 1 }}
                                </a>
                            </td>
                            <td>{{ course.title }}</td>
                            <td v-if="can_edit || can_delete">
                                <a href="#" @click="showSubscriptions(course.users)">
                                    {{ course.users.length }} مشترك
                                </a>
                            </td>
                            <td>
                                <a :href="`course/`  + course.id " target="_blank">عرض</a>
                            </td>
                            <td>{{ course.start_at | date }}</td>
                            <td>{{ course.end_at | date }}</td>
                            <td>{{ course.hours }} ساعة</td>
                            <td>{{ course.trainer_name }}</td>
                            <td>
                                <p v-if="!course.is_active" class="badge m-2 badge-light-danger">
                                    {{ course.status }}</p>
                                <p v-else-if="course.is_active" class="badge m-2 badge-light-success">
                                    {{ course.status }}</p>
                            </td>

                            <td class="text-center">
                                <a v-if="can_edit" :href="`courses/`  + course.id+`/edit`"
                                   class="text-primary me-2">
                                    <i class="las la-pencil-alt text-primary fs-2x"></i>
                                </a>

                                <a v-if="can_delete" href="javascript:;" @click="deleteCourse(course)"
                                   class="text-danger ">
                                    <i class="las la-trash text-danger fs-2x"></i>
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <pagination :data="courses" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>المشتركين</h5>
                        <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                            <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                          transform="rotate(-45 6 17.3137)" fill="black"/>
									<rect x="7.41422" y="6" width="16" height="2" rx="1"
                                          transform="rotate(45 7.41422 6)" fill="black"/>
								</svg>
							</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <table class="table table-row-bordered gy-5">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>رقم الهوية</th>
                                <th>التقييم</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(user, index) in processedUsers" :key="user.id">
                                <td>{{ index + 1 }}</td>
                                <td>{{ user.name }}</td>
                                <td>{{ user.ssn }}</td>
                                <td>
                                    <a v-if="!user.is_evaluated" class="badge m-2 badge-light-danger">لم يتم التقييم</a>
                                    <a :href="`showEvaluate/`+user.evalutated_id" v-else-if="user.is_evaluated"
                                       target="_blank"
                                       class="badge m-2 badge-light-success">تم التقييم</a>
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</template>

<script>
import moment from "moment";

export default {
    name: "Courses",
    props: ['can_edit', 'can_delete'],
    data() {
        return {
            current_page: null,
            courses: {},
            'loading': false,
            searchQuery: null,
            'postProgress': false,
            subscriptionUsers: [],
        }
    },
    computed: {
        processedUsers() {
            if (this.can_edit) {
                if (!this.courses.data || !Array.isArray(this.courses.data)) {
                    return [];
                }
                const processedUsers = [];
                this.courses.data.forEach(course => {
                    course.users.forEach(user => {
                        const evaluation = user.course_evaluations.find(evaluation => evaluation.course_id === course.id);
                        user.evalutated_id = evaluation ? evaluation.id : null;
                        user.is_evaluated = evaluation !== undefined;
                        processedUsers.push(user);
                    });
                });
                return processedUsers;
            }
        }
    },
    mounted() {
        this.getResults();

    },
    filters: {
        shorten(value) {
            return value.substr(0, 30) + '...';
        },
        removeHtml(value) {
            return value.replace(/<[^>]*>?/gm, '');
        },
        date(value) {
            return moment(value).locale("ar").format("ll");
        },
    },
    methods: {
        getResults(page = 1) {
            this.loading = true;
            let query = this.searchQuery;
            axios.get(url_site + 'get-courses/' + '?page=' + page + '&query=' + query)
                .then((response) => {
                    this.courses = response.data;
                    this.current_page = response.data.current_page;
                    this.loading = false
                });
        },
        deleteCourse(course) {
            Swal.fire({
                html: `هل انت متاكد من عملية الحذف؟`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "نعم!",
                cancelButtonText: 'لا',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(url_site + 'courses/' + course.id)
                        .then((response) => {
                            this.courses.data = this.courses.data.filter(obj => {
                                return obj.id != course.id;
                            });
                            Swal.fire({
                                text: "تم الحذف بنجاح",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "موافق",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            });
                        }).catch(error => {
                        Swal.fire({
                            text: "عذراً، هناك مشكلة ما",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "موافق",
                            customClass: {
                                confirmButton: "btn btn-danger"
                            }
                        });
                    });
                }
            });

        },
        showSubscriptions(subscriptions) {
            console.log(subscriptions);
            $('#kt_modal').modal('show');
            this.subscriptionUsers = subscriptions;
        },
        search() {
            this.getResults(1);
        },
    },
}
</script>

<style scoped>

</style>
