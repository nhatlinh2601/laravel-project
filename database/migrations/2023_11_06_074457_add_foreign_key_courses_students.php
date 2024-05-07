<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses_students', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade ')->onDelete('cascade ');
        });
        Schema::table('courses_students', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade ')->onDelete('cascade ');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses_students', function (Blueprint $table) {
            $table->dropForeign('courses_students_course_id_foreign');
        });
        Schema::table('courses_students', function (Blueprint $table) {
            $table->dropForeign('courses_students_student_id_foreign');
        });
    }
};
