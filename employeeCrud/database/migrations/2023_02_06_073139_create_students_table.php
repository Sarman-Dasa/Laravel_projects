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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("student_name",30);
            $table->string("student_email",40);
            $table->bigInteger("student_mobile_number");
            $table->string("city",30);
            $table->text("student_address");
            $table->unsignedBigInteger("deparment_id");
            $table->timestamps();
            $table->softDeletes();
            $table->foreign("deparment_id")->references("id")->on("departments")->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
