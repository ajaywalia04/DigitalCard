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

    public function myCard(){
        return $this->hasOne(MyCard::class);
    }

    public function sharedCards()
    {
        return $this->hasMany(SharedCard::class);
    }

    public function cardNotes()
    {
        return $this->hasMany(CardNote::class);
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function helps()
    {
        return $this->hasMany(Help::class);
    }

    public function socialMedias()
    {
        return $this->hasMany(SocialMedia::class);
    }

    public function landingPage()
    {
        return $this->hasOne(LandingPage::class);
    }

    public function landingServices()
    {
        return $this->hasMany(LandingService::class);
    }

    public function landingContactUs()
    {
        return $this->hasMany(LandingContactUs::class);
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
