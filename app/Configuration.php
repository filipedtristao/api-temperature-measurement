<?php

namespace App;

use App\Enums\ConfigurationEnum;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Configuration
 *
 * @property int $id
 * @property string $type
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configuration whereValue($value)
 * @mixin \Eloquent
 */
class Configuration extends Model
{
    protected $fillable = [
        'type',
        'value'
    ];

    public static function minTemperature(): Configuration
    {
        /** @var Configuration $configuration */
        $configuration = Configuration::where('type', ConfigurationEnum::MIN_TEMPERATURE())
            ->firstOrNew([]);

        return $configuration;
    }

    public static function maxTemperature(): Configuration
    {
        /** @var Configuration $configuration */
        $configuration = Configuration::where('type', ConfigurationEnum::MAX_TEMPERATURE())
            ->firstOrNew([]);

        return $configuration;
    }
}
