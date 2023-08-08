<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{


    /**
     *
     */
    public function __construct()
    {
        $this->authorizeResource(Course::class, null, [
            'except' => ['index'],
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('manage.courses.index');
    }

    public function getCourses(): Collection|LengthAwarePaginator|array
    {
        if (auth()->user()->hasAbility('courses.update')) {
            $courses = Course::with('users.courseEvaluations:id,course_id,user_id','courseEvaluations')->withCount('users');
        } else {
            $courses = Course::whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            });
        }
        if (\request()->get('query') != 'null' && !empty(\request()->get('query'))) {
            $courses = $courses->where('title', 'LIKE', '%' . \request()->get('query') . '%');
        }
        if (request()->all) {
            return $courses->orderBy('id', 'DESC')->select('id', 'title')->get();
        }
        return $courses->orderBy('id', 'DESC')->paginate();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('manage.courses.create');
    }


    /**
     * @param StoreCourseRequest $request
     * @return bool|JsonResponse|string
     */
    public function store(StoreCourseRequest $request): bool|JsonResponse|string
    {
        try {
            $data = $request->all();
            $data['created_by'] = auth()->id();

            DB::beginTransaction();

            $course = Course::create($data);
            $course->users()->attach($data['users']);
            DB::commit();

            return json_encode(['success' => true, 'message' => 'تم اضافة الدورة بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'حدث خطأ غير متوقع. الرجاء المحاولة مرة أخرى لاحقًا.'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|View
     */
    public function edit(Course $course): Application|Factory|View
    {
        return view('manage.courses.edit', ['course' => $course->load('users')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCourseRequest $request
     * @param Course $course
     * @return false|string
     */
    public function update(StoreCourseRequest $request, Course $course): bool|string
    {
        try {
            $data = $request->all();
            DB::beginTransaction();
            $course->update($data);
            $course->users()->sync($data['users']);
            DB::commit();

            return json_encode(['success' => true, 'message' => 'تم اضافة الدورة بنجاح']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'حدث خطأ غير متوقع. الرجاء المحاولة مرة أخرى لاحقًا.'], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        $data = [
            'status' => 'success',
            'message' => 'تم حذف الصلاحية بنجاح'
        ];
        return response($data, 200);
    }

}
