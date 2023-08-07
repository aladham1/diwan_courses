<x-manage title="تقييم دورة">
    <x-slot name="headerPage">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">تقييم دورة {{$course->title}}</h1>
        </div>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0" style="background-position: 100% 50%; background-image:url({{asset('assets/media/42.png')}})">
                    <!--begin::Wrapper-->
                    <div class="mb-10">
                        <!--begin::Title-->
                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                <span class="me-2">

                  شكراً لك، لقد قمت بتقييم دورة:  <br> <span style="font-size: 45px; color: green">{{$course->title}}</span>  <br> بنجاح!
                </span>
                        </div>
                        <!--end::Title-->


                    </div>
                    <!--begin::Wrapper-->

                    <!--begin::Illustration-->
                    <img class="mx-auto h-150px h-lg-200px  theme-light-show" src="{{asset('assets/media/17.png')}}" alt="">
                    <img class="mx-auto h-150px h-lg-200px  theme-dark-show" src="{{asset('assets/media/illustrations/misc/17-dark.png')}}" alt="">

                    <!--end::Illustration-->
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">

    </x-slot>
</x-manage>

