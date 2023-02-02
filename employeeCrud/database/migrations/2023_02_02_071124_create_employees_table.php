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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("employeeName",20);
            $table->string("employeeEmail",30)->unique();
            $table->bigInteger("employeeMobileNo")->unique();
            $table->string("employeeDepartmentName",30);
            $table->date("employeeHiredate");
            $table->date("employeebirthdate");
            $table->enum("employeeGender",['Male','Female','Other']);
            $table->integer("employeeSalary");
            $table->string('employeeImage',30)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
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
