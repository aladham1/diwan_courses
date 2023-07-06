<!--begin::Menu-->
<div
    class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
    id="#kt_aside_menu" data-kt-menu="true">

    <div class="menu-item">
        <a class="menu-link" href="{{route('dashboard')}}">
										<span class="menu-icon">
										<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
													<rect x="2" y="2" width="9" height="9" rx="2" fill="black"/>
													<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                                          fill="black"/>
													<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                                          fill="black"/>
													<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                                          fill="black"/>
												</svg>
											</span>
                                            <!--end::Svg Icon-->
										</span>
            <span class="menu-title">الرئيسية</span>
        </a>
    </div>

    <div class="menu-item">
        <div class="menu-content pt-8 pb-2">
            {{--            <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{__('common.management')}}</span>--}}
        </div>
    </div>


    @if ( Auth::user()->can('view-any', \App\Models\User::class) || Auth::user()->can('view-any',  \App\Models\Role::class) )
        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
									<span class="menu-link">
										<span class="menu-icon">
<span class="svg-icon svg-icon-2">   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                          fill="none">
<path
    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
    fill="black"/>
<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black"/>
<path
    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
    fill="black"/>
<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black"/>
</svg></span>
										</span>
										<span class="menu-title">المستخدمين</span>
										<span class="menu-arrow"></span>
									</span>
            <div class="menu-sub menu-sub-accordion">
                @can('view-any', \App\Models\Manager::class)
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('users.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title">كل المستخدمين</span>
                        </a>
                    </div>
                @endcan
                @can('view-any', \App\Models\Role::class)
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('roles.index')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                            <span class="menu-title">الصلاحيات</span>
                        </a>
                    </div>
                @endcan
            </div>
        </div>
    @endif

    <div class="menu-item">
        <div class="menu-content pt-8 pb-2">
            {{--            <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{__('common.website')}}</span>--}}
        </div>
    </div>

</div>
<!--end::Menu-->
