<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{config('settings.seo_description')}}"/>
    <meta name="keywords" content="{{config('settings.seo_keywords')}}"/>
    <meta property="og:url" content="@yield('meta_url',route('index'))">
    <meta property="og:title" content="@yield('meta_title',config('settings.seo_title'))">
    <meta property="og:type" content="article">
    <meta property="og:description" content="@yield('meta_description',config('settings.seo_description'))">
    <meta property="og:image" content="@yield('meta_image',asset('assets/media/logos/logo.png'))">
    <meta property="og:image:secure_url" content="@yield('meta_image',asset('assets/media/logos/logo.png'))">
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    {{--    @yield('meta')--}}
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>

    <title>@yield('title') - {{config('settings.seo_title')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @yield('css_page')
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/solid.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/line-awesome/css/line-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/flaticon/flaticon.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
</head>
<body class="">
<div class="loading">
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>
<div id="app">
    @include('layouts.header')
    @yield('content')

    <footer>
        <div class="logo text-center">
            <img src="{{asset('assets/images/footer-logo.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>تابعنا</h5>
                    <ul class="social-media">
                        @if(config('settings.instagram'))
                            <li>
                                <a href="{{config('settings.instagram')}}"><span class="flaticon-instagram-logo"></span></a>
                            </li>
                        @endif
                        @if(config('settings.twitter'))
                            <li>
                                <a href="{{config('settings.twitter')}}"><span class="flaticon-twitter-logo"></span></a>
                            </li>
                        @endif
                        @if(config('settings.facebook'))
                            <li>
                                <a href="{{config('settings.facebook')}}"><span class="flaticon-facebook-letter-logo"></span></a>
                            </li>
                        @endif
                    </ul>
                    <form action="" class="form-subscribe">
                        <h5>اشتراك في النشرة البريدية</h5>
                        <div class="mt-2">
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   placeholder="email@example.com" aria-describedby="emailHelp">
                            <button type="submit" class="btn btn-primary">
                                <span class="la la-chevron-left"></span>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <ul class="footer-menu">
                        <li>
                            <a href="{{route('index')}}" class="nav-link">الرئيسية</a>
                        </li>
                        <li>
                            <a href="{{route('website.courses.index')}}" class="nav-link">الدورات</a>
                        </li>
                        <li>
                            <a href="{{route('website.about_us')}}" class="nav-link">من نحن</a>
                        </li>
                        <li>
                            <a href="{{route('website.contact_us')}}" class="nav-link">تواصل معنا</a>
                        </li>
                        <li>
                            <a href="{{route('website.privacy')}}" class="nav-link">سياسة الخصوصية</a>
                        </li>
                        <li>
                            <a href="{{route('website.terms')}}" class="nav-link">الشروط والأحكام</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-3">
                    <div class="contact-us">
                        <h5>تواصل معنا</h5>
                        <ul>
                            <li>
                                <a href="tel:{{config('settings.mobile')}}">
                                    <span>{{config('settings.mobile')}}</span>
                                    <span class="la la-phone"></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://wa.me/{{config('settings.whatsApp')}}" target="_blank">
                                    <span>{{config('settings.whatsApp')}}</span>
                                    <span class="la la-whatsapp"></span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:{{config('settings.email')}}">
                                    <span>{{config('settings.email')}}</span>
                                    <span class="la la-envelope"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <p class="mt-4 copyright">جميع الحقوق محفوظة لأكاديمية الحرف {{date('Y')}}</p>
                <a href="https://aladham.dev/" target="_blank" style="font-size: 12px">تطوير AlAdham</a>
            </div>
        </div>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@if (Auth::check())
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => true,
            'user' => Auth::user()
        ])!!}
    </script>
@else
    <script>
        window.Laravel = {!!json_encode([
            'isLoggedin' => false
        ])!!}
    </script>
@endif
<script src="{{mix('js/app.js')}}"></script>
<script>
    $(window).on('load', function () {
        $('.loading').fadeOut(500);
    });

</script>
@if(Session::get("message"))
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        Swal.fire({
            title: "{{Session::get("title")}}",
            text: "{{Session::get("message")}}",
            icon: "{{Session::get("icon")}}",
            buttonsStyling: false,
            confirmButtonText: "حسناً",
            customClass: {
                confirmButton: "btn btn-primary"
            }
        })
    </script>
@endif
@yield('js_page')

</body>
</html>
