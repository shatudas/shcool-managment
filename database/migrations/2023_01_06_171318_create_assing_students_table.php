<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Integer;

class CreateAssingStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assing_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('roll')->nullable();
            $table->integer('student_id')->comment('user_id=student_id');
            $table->integer('class_id');
            $table->integer('yesr_id');
            $table->integer('group_id')->nullable();
            $table->integer('shift_id')->nullable();
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
        Schema::dropIfExists('assing_students');
    }
}
