<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(Request $request): JsonResponse
    {

        $car = User::create($request->all());

        return response()->json($car);

    }

    public function updateCar(Request $request, $id): JsonResponse
    {
        $car = User::find($id);
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->save();

        return response()->json($car);
    }

    public function deleteCar($id): JsonResponse
    {
        $car = User::find($id);
        $car->delete();

        return response()->json('Removed successfully.');
    }

    public static function index(): JsonResponse
    {

        $cars = User::all();

        return response()->json($cars);

    }
}
