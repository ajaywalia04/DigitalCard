<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Help extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'message'];


    public static function boot(){

        parent::boot();

        static::creating(function ($model) {

            $model->uuid = Str::uuid();
        });
    }

##########################################################
##          Relation
##########################################################

    public function user(){
        return $this->belongsTo(User::class);
    }

}
