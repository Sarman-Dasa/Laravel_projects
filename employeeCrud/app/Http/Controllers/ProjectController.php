<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
   public function addProject()
   {
        $project = new Project();
        $project->name = "Collage Managment";
        $project->save();
   }
}
