<x-manage title="{{$title}}">
    <x-slot name="headerPage">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">{{__('common.'. $title)}}</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">

        </div>
    </x-slot>

    <form class="form" id="settings_form">
        <input type="hidden" name="page" value="{{$title}}">
        <textarea class="ckeditor form-control" id="ckeditor">
           {!! $settings !!}
        </textarea>

        <div class="text-center pt-15">
            <button type="button" class="btn btn-primary btn-save">
                <span class="indicator-label">تحديث</span>
            </button>
        </div>
    </form>

    <x-slot name="js">
        <script src="{{asset('assets/js/ckeditor/ckeditor.js')}}"></script>
        <script>
            $(document).ready(function () {
                var update_transaction = function () {
                    $('.btn-save').on("click", function (e) {
                        e.preventDefault(); //prevent the form from submitting
                        var data = new FormData($("#settings_form")[0])
                        //add the content
                        data.append('content_a', CKEDITOR.instances['ckeditor'].getData());
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
