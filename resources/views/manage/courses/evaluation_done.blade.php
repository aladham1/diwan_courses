<x-manage title="تقييم دورة">
    <x-slot name="headerPage">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">الموظف  {{$evaluation->user->name}} - </h1>
            <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">تقييم دورة  {{$evaluation->course->title}}  </h1>
        </div>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="container mt-5">
                <form action="#">
                    <div class="form-section">
                        <h3>أولاً: تقييم المدرب</h3>
                        @foreach($trainerEvaluationColumns as  $column => $label)
                            <div class="form-group">
                                <label class="mb-3 ms-1"> {{$label}}</label>
                                <div class="mb-10 d-flex ms-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$column} == "ممتاز" ? 'checked' : 'disabled' }} name="{{$column}}"
                                               value="ممتاز" >
                                        <label class="form-check-label" for="a1">ممتاز</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$column} == "جيد جداً" ? 'checked' : 'disabled' }} name="{{$column}}"
                                               value="جيد جداً">
                                        <label class="form-check-label">جيد جداً</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$column} == "جيد" ? 'checked' : 'disabled' }} name="{{$column}}"
                                               value="جيد">
                                        <label class="form-check-label">جيد</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$column} == "متوسط" ? 'checked' : 'disabled' }} name="{{$column}}"
                                               value="متوسط">
                                        <label class="form-check-label">متوسط</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$column} == "ضعيف" ? 'checked' : 'disabled' }} name="{{$column}}"
                                               value="ضعيف">
                                        <label class="form-check-label">ضعيف</label>
                                    </div>
                                </div>
                                @error($column)
                                <div class="alert alert-danger">يجب تقييم هذا السؤال</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="form-section">
                        <h3>ثانياً: تقييم محتوى الحقيبة التدريبية</h3>
                        @foreach($courseContentEvaluationColumns as  $courseContentEvaluationColumn => $courseContentEvaluationLabel)
                            <div class="form-group">
                                <label class="mb-3 ms-1"> {{$courseContentEvaluationLabel}}</label>
                                <div class="mb-10 d-flex ms-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "ممتاز" ? 'checked' : 'disabled' }} name="{{$courseContentEvaluationColumn}}"
                                               value="ممتاز" >
                                        <label class="form-check-label" for="a1">ممتاز</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "جيد جداً" ? 'checked' : 'disabled' }} name="{{$courseContentEvaluationColumn}}"
                                               value="جيد جداً">
                                        <label class="form-check-label">جيد جداً</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "جيد" ? 'checked' : 'disabled' }} name="{{$courseContentEvaluationColumn}}"
                                               value="جيد">
                                        <label class="form-check-label">جيد</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "متوسط" ? 'checked' : 'disabled' }} name="{{$courseContentEvaluationColumn}}"
                                               value="متوسط">
                                        <label class="form-check-label">متوسط</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "ضعيف" ? 'checked' : 'disabled' }} name="{{$courseContentEvaluationColumn}}"
                                               value="ضعيف">
                                        <label class="form-check-label">ضعيف</label>
                                    </div>
                                </div>
                                @error($courseContentEvaluationColumn)
                                <div class="alert alert-danger">يجب تقييم هذا السؤال</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="form-section">
                        <h3>ثالثاً: معلومات إضافية</h3>
                        @foreach($otherEvaluationColumns as  $otherEvaluationColumn => $otherEvaluationLabel)
                            <div class="form-group">
                                <label class="mb-3 ms-1"> {{$otherEvaluationLabel}}</label>
                                <div class="mb-10 d-flex ms-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "ممتاز" ? 'checked' : 'disabled' }} name="{{$otherEvaluationColumn}}"
                                               value="ممتاز" >
                                        <label class="form-check-label" for="a1">ممتاز</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "جيد جداً" ? 'checked' : 'disabled' }} name="{{$otherEvaluationColumn}}"
                                               value="جيد جداً">
                                        <label class="form-check-label">جيد جداً</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "جيد" ? 'checked' : 'disabled' }} name="{{$otherEvaluationColumn}}"
                                               value="جيد">
                                        <label class="form-check-label">جيد</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "متوسط" ? 'checked' : 'disabled' }} name="{{$otherEvaluationColumn}}"
                                               value="متوسط">
                                        <label class="form-check-label">متوسط</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{$evaluation->{$courseContentEvaluationColumn} == "ضعيف" ? 'checked' : 'disabled' }} name="{{$otherEvaluationColumn}}"
                                               value="ضعيف">
                                        <label class="form-check-label">ضعيف</label>
                                    </div>
                                </div>
                                @error($otherEvaluationColumn)
                                <div class="alert alert-danger">يجب تقييم هذا السؤال</div>
                                @enderror
                            </div>
                        @endforeach
                        <div class="form-group mb-5">
                            <label class="mb-3">أهم المعارف التي حصلت عليها:</label>
                            <textarea disabled class="form-control" name="knowledge_acquired" rows="4">{{$evaluation->knowledge_acquired}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="mb-3">أهم المهارات التي إكتسبتها من المشاركة في الدورة:</label>
                            <textarea disabled class="form-control" name="skills_acquired" rows="4">{{$evaluation->skills_acquired}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="mb-3">القيم المكتسبة من الدورة:</label>
                            <textarea disabled class="form-control" name="values_gained" rows="4">{{$evaluation->values_gained}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="mb-3">الدورات القادمة المقترحة:</label>
                            <textarea disabled class="form-control" name="suggested_upcoming_courses" rows="4">{{$evaluation->suggested_upcoming_courses}}</textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="js">

    </x-slot>
</x-manage>

