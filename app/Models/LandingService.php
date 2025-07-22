<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingService extends Model
{
    use HasFactory;
    protected $fillable = [
        'heading',
        'sub_heading',
        'icon'
    ];

    public static function boot(){

        parent::boot();

        static::creating(function ($model) {

            $model->uuid = Str::uuid();
        });
    }
}
