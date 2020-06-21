<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Configuration
 *
 * @property int $id
 * @property string $type
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Configurations whereValue($value)
 * @mixin \Eloquent
 */
class Configuration extends Model
{
    //
}
