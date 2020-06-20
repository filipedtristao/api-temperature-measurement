<?php

namespace App\Http\Controllers;

use App\TemperatureMeasurement;
use Illuminate\Http\Request;
use function compact;
use function view;

class TemperatureMeasurementController extends Controller
{
    public function index()
    {
        $temperatureMeasurements = TemperatureMeasurement::orderBy('created_at', 'DESC')->get();

        return view('temperature-measurement', compact([
            'temperatureMeasurements'
        ]));
    }
}
