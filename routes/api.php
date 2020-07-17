<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/temperature-measurements', 'TemperatureMeasurementController@indexApi')
    ->name('api.temperature-measurement.store');
