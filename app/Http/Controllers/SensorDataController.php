<?php

// app/Http/Controllers/SensorDataController.php
namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;

class SensorDataController extends Controller
{
    public function index()
    {
        $data = SensorData::all();
        return response()->json($data);
    }

    public function show($id)
    {
        $data = SensorData::find($id);
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $sensorData = SensorData::create($request->all());
        return response()->json($sensorData, 201);
    }

    public function showViewdht11()
    {
        $data = SensorData::all(); // Asegúrate de que los datos están siendo obtenidos correctamente.
        return view('data_dht11', compact('data')); // Pasa la variable $data a la vista
    }
}
