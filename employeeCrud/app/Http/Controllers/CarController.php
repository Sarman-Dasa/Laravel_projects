<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function addCar($id)
    {
        $mechanic = Mechanic::find($id);
        $car = new Car();
        $car->model = "i10";
        $mechanic->car()->save($car);
    }
}
