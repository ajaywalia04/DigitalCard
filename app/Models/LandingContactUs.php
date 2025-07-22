<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingContactUs extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'message',
        'user_id'
    ];

    public static function boot(){

        parent::boot();

        static::creating(function ($model) {

            $model->uuid = Str::uuid();
        });
    }
}
