<x-manage title="الرئيسية">
    <x-slot name="titlePage">الرئيسية</x-slot>
    <div class="card card-bordered mb-7">
        <div class="card-header">
            <h4 class="card-title align-items-center flex-column">الدورات الحالية</h4>
        </div>
        <div class="card-body">
            <div class="row">
              @foreach($courses as $course)
                    <div class="col-md-3">
                        <a href="{{$course->userCanEvaluate() ? route('evaluation.show', $course->id) : '#'}}">
                            <div class="col bg-light-{{$course->bgColor()}} px-6 py-8 rounded-2">
                                <div class="row">
                                    <div class="col-6">
                            <span class="svg-icon svg-icon-3x svg-icon-{{$course->bgColor()}} d-block my-2">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path d="M12.0444 17.9444V12.1444L17.0444 15.0444C18.6444 15.9444 19.1445 18.0444 18.2445 19.6444C17.3445 21.2444 15.2445 21.7444 13.6445 20.8444C12.6445 20.2444 12.0444 19.1444 12.0444 17.9444ZM7.04445 15.0444L12.0444 12.1444L7.04445 9.24445C5.44445 8.34445 3.44444 8.84445 2.44444 10.4444C1.54444 12.0444 2.04445 14.0444 3.64445 15.0444C4.74445 15.6444 6.04445 15.6444 7.04445 15.0444ZM12.0444 6.34444V12.1444L17.0444 9.24445C18.6444 8.34445 19.1445 6.24444 18.2445 4.64444C17.3445 3.04444 15.2445 2.54445 13.6445 3.44445C12.6445 4.04445 12.0444 5.14444 12.0444 6.34444Z" fill="black"/>
<path opacity="0.3" d="M7.04443 9.24445C6.04443 8.64445 5.34442 7.54444 5.34442 6.34444C5.34442 4.54444 6.84444 3.04443 8.64444 3.04443C10.4444 3.04443 11.9444 4.54444 11.9444 6.34444V12.1444L7.04443 9.24445ZM17.0444 15.0444C18.0444 15.6444 19.3444 15.6444 20.3444 15.0444C21.9444 14.1444 22.4444 12.0444 21.5444 10.4444C20.6444 8.84444 18.5444 8.34445 16.9444 9.24445L11.9444 12.1444L17.0444 15.0444ZM7.04443 15.0444C6.04443 15.6444 5.34442 16.7444 5.34442 17.9444C5.34442 19.7444 6.84444 21.2444 8.64444 21.2444C10.4444 21.2444 11.9444 19.7444 11.9444 17.9444V12.1444L7.04443 15.0444Z" fill="black"/>
</svg>
															</span>
                                        <p class="text-{{$course->bgColor()}} fw-bold fs-6 mb-0">{{$course->title}}</p>
                                    </div>
                                    <div class="col-6">
                                        <h3 class="home-d text-{{$course->bgColor()}}">{{ $course->days}} {{$course->hours <= 10 ? 'ساعات' :'ساعة'}}</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
              @endforeach
            </div>
        </div>
    </div>

</x-manage>
