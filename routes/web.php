<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('medicoes');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/medicoes', 'TemperatureMeasurementController@index')->name('temperature-measurement.index');
    Route::post('/configurations', 'ConfigurationController@store')->name('configurations');
});

Route::post('/temperature-measurements', 'TemperatureMeasurementController@store')
    ->name('temperature-measurement.store');

Auth::routes();
