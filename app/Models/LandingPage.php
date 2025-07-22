<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_heading',
        'sub_heading',
        'about_us',
        'service_heading',
        'contact_sub_heading',
        'color_no'
    ];

    public static function boot(){

        parent::boot();

        static::creating(function ($model) {

            $model->uuid = Str::uuid();
            $model->slug = Str::upper(Str::random(8));
        });
    }

    ######################################################################
    #      Relation
    ######################################################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
