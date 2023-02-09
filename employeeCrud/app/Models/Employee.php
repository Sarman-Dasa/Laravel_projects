<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $casts = [
        'employee_salary'=>'integer'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function getEmployeeNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    // protected function employeeName():Attribute
    // {
    //     return new  Attribute(
    //         get: fn ($value) => ucfirst($value),
    //         set: fn ($value) => strtolower($value)
    //     );
    // }

    protected function employeeName() :Attribute
    {
        return new Attribute(
            get: fn($value) =>Str::camel($value)
        );
    }
    protected function EmployeeHiredate():Attribute
    {
        return new  Attribute(
            get: fn ($value) => date('d-M-Y',strtotime($value)),
            set: fn ($value) => date('y-m-d',strtotime($value))
        );
    }
}
