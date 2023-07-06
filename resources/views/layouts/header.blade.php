<header>
    <div class="container">
        <b-navbar toggleable="lg">
            <div class="container-fluid">

                    <a class="navbar-brand" href="{{route('index')}}">
                        <img src="{{asset('assets/images/logo.png')}}" alt="اكاديمية حرف">
                    </a>
             
                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                <b-collapse id="nav-collapse" is-nav>
                    <ul class="navbar-nav text-start mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="{{route('index')}}" class="nav-link">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('website.our_courses')}}" class="nav-link">دورات الاكاديمية</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('website.about_us')}}" class="nav-link">من نحن</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('website.contact_us')}}" class="nav-link">تواصل معنا</a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item">
                                <a href="{{route('website.my_account')}}" class="nav-link login">حسابي</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{route('website.login')}}" class="nav-link login">دخول</a>
                            </li>
                        @endif
                    </ul>

                </b-collapse>
                <search></search>
            </div>
        </b-navbar>
    </div>
</header>


