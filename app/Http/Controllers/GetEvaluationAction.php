<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseEvaluation;
use Illuminate\Http\Request;

class GetEvaluationAction extends Controller
{

    public function __invoke(Request $request, Course $course)
    {
        $evaluation = CourseEvaluation::whereCourseId($course->id)->whereUserId(auth()->id())->first();
        if ($evaluation){
            return view('manage.courses.evaluated',['course' => $course]);
        }
        $trainerEvaluationColumns = [
            'knowledge_of_subject' => '1. المدرب لديه معرفة تامة بالمادة العلمية وإلمام بكل جوانبها',
            'presentation_skills' => '2. المدرب لديه مهارات في تقديم اللقاء وإدارته',
            'use_of_enrichment' => '3. المدرب يستخدم الوسائل الاثرائية في شرح المادة العلمية',
            'cooperation_with_trainees' => '4. تعاون المدرب مع المتدربين',
            'ability_to_motivate_trainees' => '5. قدرة المدرب على تحفيز المتدربين على التفاعل',
            'time_management_skills' => '6. المدرب لديه قدرة على إدارة الوقت من خلال الاستغلال الأمثل له',
        ];
        $courseContentEvaluationColumns = [
            'course_objectives' => 'أهداف الدورة واضحة لك',
            'sufficient_training_material' => 'المادة التدريبية كافية',
            'includes_exercises' => 'تحوي عدد من التدريبات',
            'content_enrichment' => 'احتواء المادة التدريبية على موضوعات زادت من خبراتك ومهاراتك',
            'course_duration' => 'مدة الدورة مناسبة للمحتوى',
            'preparation_tools' => 'التجهيزات والوسائل المستخدمة في إعداد اللقاء التدريبي',
            'interaction_with_material' => 'مدى التفاعل مع المادة التدريبية',
        ];
        $otherEvaluationColumns = [
            'suitable_for_course' => 'هل تعتقد أنك الشخص المناسب لحضور الدورة',
            'helped_develop_skills' => 'هل تعتقد أن الدورة ساعدتك على تطوير مهاراتك',
            'general_evaluation' => 'ما هو تقييمك العام عن الدورة',
        ];
        return \view('manage.courses.evaluation', ['course' => $course,
            'trainerEvaluationColumns' => $trainerEvaluationColumns,
            'otherEvaluationColumns' => $otherEvaluationColumns,
            'courseContentEvaluationColumns' => $courseContentEvaluationColumns]);
    }
}