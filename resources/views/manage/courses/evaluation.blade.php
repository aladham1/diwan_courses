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
                <form action="{{route('evaluation.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id"  value="{{$course->id}}">
                    <!-- Trainer Evaluation -->
                    <div class="form-section">
                        <h3>أولاً: تقييم المدرب</h3>
                        @foreach($trainerEvaluationColumns as  $column => $label)
                            <div class="form-group">
                                <label class="mb-3 ms-1"> {{$label}}</label>
                                <div class="mb-10 d-flex ms-4">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($column) == "ممتاز" ? 'checked' : ''}} name="{{$column}}"
                                               value="ممتاز" >
                                        <label class="form-check-label" for="a1">ممتاز</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($column) == "جيد جداً" ? 'checked' : ''}} name="{{$column}}"
                                               value="جيد جداً">
                                        <label class="form-check-label">جيد جداً</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($column) == "جيد" ? 'checked' : ''}} name="{{$column}}"
                                               value="جيد">
                                        <label class="form-check-label">جيد</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($column) == "متوسط" ? 'checked' : ''}} name="{{$column}}"
                                               value="متوسط">
                                        <label class="form-check-label">متوسط</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($column) == "ضعيف" ? 'checked' : ''}} name="{{$column}}"
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
                                        <input type="radio" class="form-check-input" {{old($courseContentEvaluationColumn) == "ممتاز" ? 'checked' : ''}} name="{{$courseContentEvaluationColumn}}"
                                               value="ممتاز" >
                                        <label class="form-check-label" for="a1">ممتاز</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($courseContentEvaluationColumn) == "جيد جداً" ? 'checked' : ''}} name="{{$courseContentEvaluationColumn}}"
                                               value="جيد جداً">
                                        <label class="form-check-label">جيد جداً</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($courseContentEvaluationColumn) == "جيد" ? 'checked' : ''}} name="{{$courseContentEvaluationColumn}}"
                                               value="جيد">
                                        <label class="form-check-label">جيد</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($courseContentEvaluationColumn) == "متوسط" ? 'checked' : ''}} name="{{$courseContentEvaluationColumn}}"
                                               value="متوسط">
                                        <label class="form-check-label">متوسط</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($courseContentEvaluationColumn) == "ضعيف" ? 'checked' : ''}} name="{{$courseContentEvaluationColumn}}"
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
                                        <input type="radio" class="form-check-input" {{old($otherEvaluationColumn) == "ممتاز" ? 'checked' : ''}} name="{{$otherEvaluationColumn}}"
                                               value="ممتاز" >
                                        <label class="form-check-label" for="a1">ممتاز</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($otherEvaluationColumn) == "جيد جداً" ? 'checked' : ''}} name="{{$otherEvaluationColumn}}"
                                               value="جيد جداً">
                                        <label class="form-check-label">جيد جداً</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($otherEvaluationColumn) == "جيد" ? 'checked' : ''}} name="{{$otherEvaluationColumn}}"
                                               value="جيد">
                                        <label class="form-check-label">جيد</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($otherEvaluationColumn) == "متوسط" ? 'checked' : ''}} name="{{$otherEvaluationColumn}}"
                                               value="متوسط">
                                        <label class="form-check-label">متوسط</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" {{old($otherEvaluationColumn) == "ضعيف" ? 'checked' : ''}} name="{{$otherEvaluationColumn}}"
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
                            <textarea class="form-control" name="knowledge_acquired" rows="4">{{old('knowledge_acquired')}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="mb-3">أهم المهارات التي إكتسبتها من المشاركة في الدورة:</label>
                            <textarea class="form-control" name="skills_acquired" rows="4">{{old('skills_acquired')}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="mb-3">القيم المكتسبة من الدورة:</label>
                            <textarea class="form-control" name="values_gained" rows="4">{{old('values_gained')}}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label class="mb-3">الدورات القادمة المقترحة:</label>
                            <textarea class="form-control" name="suggested_upcoming_courses" rows="4">{{old('suggested_upcoming_courses')}}</textarea>
                        </div>
                    </div>


                    <!-- Submit Button -->
                    <div class="form-section">
                        <button type="submit" class="btn btn-primary submit-btn">إرسال التقييم</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <x-slot name="js">

    </x-slot>
</x-manage>

