<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEvaluationRequest;
use App\Models\Course;
use App\Models\CourseEvaluation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 *
 */
class StoreEvaluationAction extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param StoreEvaluationRequest $request
     * @return RedirectResponse
     */
    public function __invoke(StoreEvaluationRequest $request): RedirectResponse
    {
        $data = $request->all();
        $course = Course::findOrFail($request->post('course_id'));
        $data['user_id'] = auth()->id();
        $data['course_id'] = $course->id;
        CourseEvaluation::create($data);
        return back()->with('success', 'تم إرسال التقييم بنجاح.');
    }
}
