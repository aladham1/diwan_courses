<x-manage title="{{__('common.settings')}}">
    <x-slot name="headerPage">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('common.settings')}}</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">

        </div>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form class="form" id="settings_form">
                <input type="hidden" name="all" value="1">
               <div class="row">
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.mobile')}}" name="mobile" class="form-control"
                                      id="mobile"
                                      placeholder="رقم الجوال"/>
                               <label for="mobile">رقم الجوال</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="email" value="{{config('settings.email')}}" name="email" class="form-control"
                                      id="email"
                                      placeholder="البريد الالكتروني"/>
                               <label for="email">البريد الالكتروني</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.seo_title')}}" name="seo_title" class="form-control"
                                      id="seo_title"
                                      placeholder="اسم الموقع / SEO Title"/>
                               <label for="seo_title">أسم الموقع / SEO Title</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.whatsApp')}}" name="whatsApp" class="form-control"
                                      id="whatsApp"
                                      placeholder="WhatsApp"/>
                               <label for="whatsApp">WhatsApp</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.facebook')}}" name="facebook" class="form-control"
                                      id="facebook"
                                      placeholder="Facebook"/>
                               <label for="facebook">Facebook</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.twitter')}}" name="twitter" class="form-control"
                                      id="twitter"
                                      placeholder="Twitter"/>
                               <label for="twitter">Twitter</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.instagram')}}" name="instagram" class="form-control"
                                      id="instagram"
                                      placeholder="Instagram"/>
                               <label for="instagram">Instagram</label>
                           </div>
                       </div>
                   </div>

                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.seo_description')}}" name="seo_description" class="form-control"
                                      id="seo_description"
                                      placeholder="SEO description"/>
                               <label for="seo_description">SEO description</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <input type="text" value="{{config('settings.seo_keywords')}}" name="seo_keywords" class="form-control"
                                      id="seo_keywords"
                                      placeholder="SEO keywords"/>
                               <label for="seo_keywords">SEO keywords (يجب الفصل بين الكلمات المفتاحية بالفاصلة مثال:  موقع، تعليم، اكاديمة)</label>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-6">
                       <div class="d-flex flex-column me-n7 pe-7">
                           <div class="form-floating mb-7">
                               <textarea name="subscription_note" class="form-control"
                                         id="subscription_note">{{config('settings.subscription_note')}}</textarea>
                               <label for="subscription_note">ملاحظة الاشتراك</label>
                           </div>
                       </div>
                   </div>
               </div>
                <div class="text-center pt-15">
                    <button type="button" class="btn btn-primary btn-save">
                        <span class="indicator-label">تحديث</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
        <script>
            $(document).ready(function () {
                var update_transaction = function () {
                    $('.btn-save').on("click", function (e) {
                        var data = new FormData($("#settings_form")[0])
                        $.ajax({
                            method: "post",
                            url: "{{route('settings.update')}}",
                            data:data,
                            headers: {
                                'X-CSRF-TOKEN': $('input[name="_token"]').val()
                            },
                            async: true,
                            processData: false,
                            contentType: false,
                            success: function (data) {
                                //  wait.resolve();
                                $(".loadingMask").css('display', 'none');
                                if (data.errors) {
                                    Swal.fire({
                                        text: "حدث خطأ ما، يرجى المحاولة فما بعد!",
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "حسناً",
                                        customClass: {
                                            confirmButton: "btn btn-danger"
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        text: "تم التحديث بنجاح!",
                                        icon: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "حسناً",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        }
                                    });
                                }
                            },
                            error: function () {
                                $(".loadingMask").css('display', 'none');
                                Swal.fire({
                                    text: "حدث خطأ ما، يرجى المحاولة فما بعد!",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "حسناً",
                                    customClass: {
                                        confirmButton: "btn btn-danger"
                                    }
                                });
                            }
                        });


                    });
                };
                update_transaction();


            });
        </script>
    </x-slot>
</x-manage>
