<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\TemperatureMeasurement;
use Illuminate\Http\Request;
use function response;
use function view;

class TemperatureMeasurementController extends Controller
{
    public function index()
    {
        $temperatureMeasurements = TemperatureMeasurement::orderBy('created_at', 'DESC')->get();

        $minTemperature = Configuration::minTemperature();
        $maxTemperature = Configuration::maxTemperature();

        return view('temperature-measurement', [
            'temperatureMeasurements' => $temperatureMeasurements,
            'minTemperature' => $minTemperature->value,
            'maxTemperature' => $maxTemperature->value
        ]);
    }

    public function store(Request $request)
    {
        TemperatureMeasurement::create([
            'temperature' => (float)$request->get('temperature')
        ]);

        return response(null, 201);
    }
}
