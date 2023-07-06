<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="d-flex align-items-center bg-light-danger rounded p-5">
                <span class="svg-icon svg-icon-danger me-5">
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3"
                                                                      d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                                      fill="black"></path>
																<path
                                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                                    fill="black"></path>
															</svg>
														</span>
													</span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">المصروفات</a>
                        <span class="text-muted fw-bold d-block">KWD</span>
                    </div>
                    <span class="fw-bolder text-danger py-1">{{$expenses}}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center bg-light-success rounded p-5">
                <span class="svg-icon svg-icon-success me-5">
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3"
                                                                      d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                                      fill="black"></path>
																<path
                                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                                    fill="black"></path>
															</svg>
														</span>
													</span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">الايرادات</a>
                        <span class="text-muted fw-bold d-block">KWD</span>
                    </div>
                    <span class="fw-bolder text-success py-1">{{$revenues}}</span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center bg-light-{{$profit > 0 ? 'success' :'danger'}} rounded p-5">
                <span class="svg-icon svg-icon-{{$profit > 0 ? 'success' :'danger'}} me-5">
														<span class="svg-icon svg-icon-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<path opacity="0.3"
                                                                      d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                                      fill="black"></path>
																<path
                                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                                    fill="black"></path>
															</svg>
														</span>
													</span>
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="fw-bolder text-gray-800 text-hover-primary fs-6">صافي الربح</a>
                        <span class="text-muted fw-bold d-block">KWD</span>
                    </div>
                    <span class="fw-bolder text-{{$profit > 0 ? 'success' :'danger'}} py-1">{{$profit}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-4">
        <!--begin::Budget-->
        <div class="card h-100">
            <div class="card-body p-9">
                <div class="fs-6 d-flex justify-content-between mb-4">
                    <div class="fw-bold"> الحالة</div>
                    <div class="d-flex fw-bolder">{{$course->status->name}} </div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">التكلفة</div>
                    <div class="d-flex fw-bolder">{{$course->cost}} KWD</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">عدد الساعات</div>
                    <div class="d-flex fw-bolder">{{$course->hours}} ساعة</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">عدد الايام</div>
                    <div class="d-flex fw-bolder">{{$course->days}} يوم</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">الورشة</div>
                    <div class="d-flex fw-bolder">{{$course->workshop->name}}</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">الفئة العمرية</div>
                    <div class="d-flex fw-bolder">{{$course->age_s}}</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">العمر</div>
                    <div class="d-flex fw-bolder">{{$course->age_text}}</div>
                </div>
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">المدرب</div>
                    <div class="d-flex fw-bolder">{{$course->trainer ? $course->trainer->name : '-'}}</div>
                </div>

                @if($course->percent)
                    <div class="separator separator-dashed"></div>
                    <div class="fs-6 d-flex justify-content-between my-4">
                        <div class="fw-bold">نسبة المدرب</div>
                        <div class="d-flex fw-bolder">{{$course->percent}} %</div>
                    </div>
                @endif
                @if($course->trainerAssistant)
                    <div class="separator separator-dashed"></div>
                    <div class="fs-6 d-flex justify-content-between my-4">
                        <div class="fw-bold">مساعد المدرب</div>
                        <div
                            class="d-flex fw-bolder">{{$course->trainerAssistant ? $course->trainerAssistant->name : '-'}}</div>
                    </div>
                @endif
                <div class="separator separator-dashed"></div>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="fw-bold">فيديو اليوتيوب</div>

                    <div class="d-flex fw-bolder">
                        @if($course->video)
                            <a href="https://www.youtube.com/watch?v={{$course->video}}">اضغط هنا</a>
                        @else
                            -
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--end::Budget-->
    </div>
    <div class="col-md-8">
        <div class="card h-100">
            <div class="card-body p-9">
                <h4>تفاصيل الدورة</h4>
                <div class="fs-6 d-flex justify-content-between my-4">
                    <div class="d-flex fw-bolder">  {!! nl2br($course->description) !!}</div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card mt-4">
    <div class="card-header border-0 pt-6">
        <div class="card-title">المصاريف</div>
    </div>
    <div class="card-body pt-0">
        <table class="table table-row-bordered gy-5">
            <thead>
            <tr class="fw-bold fs-6 text-muted">
                <th>#</th>
                <th>العنوان</th>
                <th>المبلغ (KWD)</th>
                <th>التاريخ</th>
                <th>النوع (قادمة / حالية)</th>
                <th>المرفق</th>
                <th>التفاصيل</th>
            </tr>
            </thead>
            <tbody>
            @foreach($course->expenses as $index=> $expense)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $expense->title }}</td>
                    <td>{{ $expense->amount }}</td>
                    <td>{{ $expense->date->format('Y-m-d') }}</td>
                    <td>
                            <span
                                class="badge m-2 badge-light-{{$expense->is_upcoming ? 'warning' : 'primary'}}">{{$expense->status}}</span>
                    </td>
                    <td>
                        @if($expense->attachment)
                            <a href="{{asset('storage/'.$expense->attachment->attachment_path)}}"
                               target="_blank">اضغط هنا</a>
                        @else
                            <p>-</p>
                        @endif
                    </td>
                    <td>{{ $expense->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header border-0 pt-6">
        <div class="card-title">الايرادات</div>
    </div>
    <div class="card-body pt-0">
        <table class="table table-row-bordered gy-5">
            <thead>
            <tr class="fw-bold fs-6 text-muted">
                <th>#</th>
                <th>العنوان</th>
                <th>المبلغ (KWD)</th>
                <th>التاريخ</th>
                <th>النوع (قادمة / حالية)</th>
                <th>المرفق</th>
                <th>التفاصيل</th>
            </tr>
            </thead>
            <tbody>
            @foreach($course->revenues as $key=> $revenue)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $revenue->title }}</td>
                    <td>{{ $revenue->amount }}</td>
                    <td>{{ $revenue->date->format('Y-m-d') }}</td>
                    <td>
                            <span
                                class="badge m-2 badge-light-{{$revenue->is_upcoming ? 'warning' : 'primary'}}">{{$revenue->status}}</span>
                    </td>
                    <td>
                        @if($revenue->attachment)
                            <a href="{{asset('storage/'.$revenue->attachment->attachment_path)}}"
                               target="_blank">اضغط هنا</a>
                        @else
                            <p>-</p>
                        @endif
                    </td>
                    <td>{{ $revenue->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<h4 class="mt-5 pt-5 pb-4">الاشتراكات</h4>
<subscriptions :course="`{{$course->id}}`"></subscriptions>
