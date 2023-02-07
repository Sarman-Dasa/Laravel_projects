<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
   public function addMechanic()
   {
        $mechanic = new Mechanic();
        $mechanic->name = "Tom";
        $mechanic->save();
   }
}
