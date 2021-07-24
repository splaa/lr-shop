<?php

namespace App\Models\WebSelf;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\Models\WebSelf
 * @mixin Builder
 */
class City extends Model
{
    use HasFactory;

    protected $table = 'city';
    protected $primaryKey = 'Code';
    public $incrementing = false;
    protected $keyType = 'string';
}
