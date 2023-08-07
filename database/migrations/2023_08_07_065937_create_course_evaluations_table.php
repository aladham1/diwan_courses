<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_evaluations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('knowledge_of_subject', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('presentation_skills', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('use_of_enrichment', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('cooperation_with_trainees', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('ability_to_motivate_trainees', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('time_management_skills', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('clear_course_objectives', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('sufficient_training_material', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('contains_exercises', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('includes_innovative_topics', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('appropriate_course_duration', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('adequate_preparation_tools', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('interaction_with_course_materials', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('suitable_for_attendee', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->enum('helped_skill_development', ['ممتاز', 'جيد جداً', 'جيد', 'متوسط', 'ضعيف']);
            $table->text('knowledge_acquired')->nullable();
            $table->text('skills_acquired')->nullable();
            $table->text('values_gained')->nullable();
            $table->text('suggested_upcoming_courses')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_evaluations');
    }
};
