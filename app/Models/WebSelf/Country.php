<?php

namespace App\Models\WebSelf;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App\Models\WebSelf
 * @mixin Builder
 */
class Country extends Model
{
    use HasFactory;

    protected $table = 'country';
}
