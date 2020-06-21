<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Enums\ConfigurationEnum;
use Illuminate\Http\Request;
use function back;

class ConfigurationController extends Controller
{
    public function store(Request $request)
    {
        Configuration::updateOrCreate(
            ['type' => ConfigurationEnum::MIN_TEMPERATURE()],
            ['value' => (float)$request->get('min_temperature')]
        );

        Configuration::updateOrCreate(
            ['type' => ConfigurationEnum::MAX_TEMPERATURE()],
            ['value' => (float)$request->get('max_temperature')]
        );

        return back()->with(['success' => 'Configuração salva com sucesso!']);
    }
}
