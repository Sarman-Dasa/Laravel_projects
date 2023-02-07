<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Mechanic;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function addOwner($id)
    {
        $car = Car::find($id);
        $owner = new Owner();
        $owner->name = "Rahul";
        $car->owner()->save($owner);
    }

    //get owner data based on mechanic id

    public function showOwner($id)
    {
       // $owner = Mechanic::find($id)->car->owner;
        $owner = Mechanic::find($id)->owner;
        return $owner;
    }
}
