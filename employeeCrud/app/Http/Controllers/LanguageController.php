<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Project;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function addLanguage($id)
    {
        $project = Project::find($id);
        $language = new Language();
        // $language->name = "Laravel";
        $language->name = "Python";
        $project->language()->save($language);
    }
}
