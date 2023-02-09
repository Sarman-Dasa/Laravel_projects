<?php

namespace App\Http\Controllers;

use App\Models\Courseable;
use App\Models\Student;
use App\Models\Subject;
use Database\Seeders\studentSeeder;
use Illuminate\Http\Request;

class studentTeacherController extends Controller
{
   public function addCourse()
   {
     return view('studentTeacher.addCourses');
   }

   public function storeCourse(Request $req)
   {
        Subject::create($req->all());
        return redirect()->route('course.create');
   }

   public function addStudentCourse()
   {
        $subject = Subject::all();
        $student = Student::all(['id','student_name']);
        return view('studentTeacher.addStudentCourse',compact('subject','student'));
   }

   public function storeStudentCourse(Request $req)
   {
     $student = Student::find($req->student_id);
     $student->subject()->attach($req->course_id);
     return redirect()->route('student.create');
   }
   public function fillData()
   {
     $student = Student::all(['id','student_name']);
     return view('studentTeacher.showStudentSubject',compact('student'));
   }
   public function showStudentSubject($id)
   {
          $data =[Student::with('Subject')->find($id)];
         // $s = Student::find($id);
         //return  $s->subject;
        return $data;
          return view('studentTeacher.showStudentSubject',compact('data'));
   }

}
