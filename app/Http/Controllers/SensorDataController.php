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
        $data = SensorData::all();
        return view('data_dht11', ['data' => $data]);

    }

    public function showViewrain()
    {
        $data = SensorData::all();
        return view('data_rain', ['data' => $data]);
    }
    public function showViewwater()
    {
        $data = SensorData::all();
        return view('data_water', ['data' => $data]);
    }

    public function showViewlux()
    {
        $data = SensorData::all();
        return view('data_lux', ['data' => $data]);
    }

    public function showViewground()
    {
        $data = SensorData::all();
        return view('data_ground', ['data' => $data]);
    }
}
