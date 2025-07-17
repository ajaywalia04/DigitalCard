<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot(){

        parent::boot();

        static::creating(function ($model) {

            $model->uuid = Str::uuid();
        });
    }


    ######################################################################
    #      Relation
    ######################################################################

    public function mycard(){
        return $this->hasOne(MyCard::class);
    }

    public function sharedcard()
    {
        return $this->hasMany(SharedCard::class);
    }

    public function cardnote()
    {
        return $this->hasMany(CardNote::class);
    }

    public function tag()
    {
        return $this->hasMany(Tag::class);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function help()
    {
        return $this->hasMany(Help::class);
    }

    ######################################################################
    #      Methods
    ######################################################################

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public static function createUser($data)
    {
        return  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
