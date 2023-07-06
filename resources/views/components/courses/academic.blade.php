<div class="row">
    <div class="col-md-4">
        <!--begin::Budget-->
        <div class="card h-100">
            <div class="card-body p-9">
                <div class="fs-2hx fw-bolder">{{$course->title}}</div>
                <div class="fs-4 fw-bold text-gray-400 mb-7">{{$course->cost}} KWD</div>
                <div class="fs-6 d-flex justify-content-between mb-4">
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
    <div class="col-md-12 mt-4">
        <div class="card h-100">
            <div class="card-body p-9">
                <h4>المواد</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>المادة</th>
                        <th>السعر (KWD)</th>
                        <th>الكمية</th>
                        <th>الوحدة</th>
                        <th>المجموع (KWD)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($course->materials as $material)
                        <tr>
                            <th>{{$material->name}}</th>
                            <th>{{$material->pivot->price}}</th>
                            <th>{{$material->pivot->quantity}}</th>
                            <th>{{$material->unit->name}}</th>
                            <th>{{$material->pivot->total}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card h-100">
            <div class="card-body p-9">
                <h4>الصور</h4>
                <div class="row">
                    @foreach($course->attachments as $attachment)
                        <div class="col-md-3">
                            <img src="{{asset('storage/'.$attachment->attachment_path)}}" class="img-fluid"
                                 alt="{{$course->title}}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
