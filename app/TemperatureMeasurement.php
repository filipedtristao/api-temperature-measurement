<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TemperatureMeasurement
 *
 * @property int $id
 * @property float $temperature
 * @property float $min_temperature
 * @property float $max_temperature
 * @property int $is_notifiable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereIsNotifiable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereMaxTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereMinTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereTemperature($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TemperatureMeasurement whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TemperatureMeasurement extends Model
{
    protected $fillable = [
        'temperature',
        'min_temperature',
        'max_temperature',
        'is_notifiable'
    ];

    protected static function booted()
    {
        static::created(function (TemperatureMeasurement $temperatureMeasurement) {
            $minTemperature = (float)Configuration::minTemperature()->value;
            $maxTemperature = (float)Configuration::maxTemperature()->value;
            $isNotifiable = $temperatureMeasurement->temperature < $minTemperature
                || $temperatureMeasurement->temperature > $maxTemperature;

            $temperatureMeasurement->update([
                'min_temperature' => $minTemperature,
                'max_temperature' => $maxTemperature,
                'is_notifiable' => $isNotifiable
            ]);
        });
    }
}
