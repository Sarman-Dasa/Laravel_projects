<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['department_name','department_email','department_mobile_number'];

    public function employee()
    {
        //return $this->hasMany(Employee::class,'department_id','id');
        return $this->hasMany(Employee::class);
    }

    public function newEmployee(){
        return $this->hasOne(Employee::class)->latestOfMany();
    }

    public function oldEmployee()
    {
        return $this->hasOne(Employee::class)->oldestOfMany();
    }

    public function workingemployee()
    {
        return $this->hasOne(Employee::class)->ofMany([
            'employee_hiredate'=>'max'],function($query){
                $query->where('employee_hiredate','<',now());
            });
    }
}

