<?php
    namespace App\Traits;
    use App\Models\Employee;

    trait queryTrait{

        public function getEmployeeData($id){
            $data = Employee::where("id",$id)->get();
            return $data;
        }
    }
?>