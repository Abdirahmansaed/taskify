<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'variable',
        'value'
    ];

    protected static function booted()
    {
        static::saved(function () {
            Cache::forget('app_settings_global');
        });

        static::deleted(function () {
            Cache::forget('app_settings_global');
        });
    }
}
