<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use App\Models\Language;
use App\Models\Project;
use Illuminate\Http\Request;

class DeploymentController extends Controller
{
   public function addDeployement($id)
   {
        $language = Language::find($id);
        $deployement = new Deployment();
        // $deployement->work = "Done";
        $deployement->work = "Pending";
        $language->deployment()->save($deployement);
   }

   public function showData($id)
   {
       // $data = Project::find($id)->language->flatMap->deployment;
       $data = Project::find($id)->deployment;
        return $data;
   }
}
