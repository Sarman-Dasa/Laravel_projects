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
        if(!Schema::hasTable('employees')){
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->string("employee_name",20);
                $table->string("employee_email",30)->unique();
                $table->bigInteger("employee_mobile_number")->unique();
                $table->string("employee_department_name",30);
                $table->date("employee_hiredate");
                $table->date("employee_birthdate");
                $table->enum("employee_gender",['Male','Female','Other']);
                $table->integer("employee_salary");
                $table->string('employee_image',30)->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
