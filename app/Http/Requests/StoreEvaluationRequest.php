<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvaluationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'knowledge_of_subject' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'presentation_skills' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'use_of_enrichment' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'cooperation_with_trainees' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'ability_to_motivate_trainees' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'time_management_skills' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'clear_course_objectives' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'sufficient_training_material' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'contains_exercises' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'includes_innovative_topics' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'appropriate_course_duration' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'adequate_preparation_tools' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'interaction_with_course_materials' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'suitable_for_attendee' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'helped_skill_development' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
            'general_evaluation' => ['required', 'in:ممتاز,جيد جداً,جيد,متوسط,ضعيف'],
        ];
    }
}
