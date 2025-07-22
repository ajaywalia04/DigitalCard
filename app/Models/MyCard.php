<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class MyCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'job_title',
        'department',
        'company_name',
        'company_address',
        'bio',
        'phone_no',
        'card_no',
    ];

    public static function boot(){

        parent::boot();

        static::creating(function ($model) {

            $model->uuid = Str::uuid();
            $model->slug = Str::upper(Str::random(8));
        });
    }

##########################################################
##          Relation
##########################################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function cardNotes()
    {
        return $this->hasMany(CardNote::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public static function createQrCode(){
        $user = Auth::user();
        $filename = 'qrcodes/card-' . $user->myCard->uuid . '.png';
         if (!Storage::disk('public')->exists($filename)) {
        $filename = 'qrcodes/card-' . $user->myCard->uuid . '.png';
        $cardUrl = url('/').'/m/'.$user->myCard->slug;
        $qrUrl = 'https://api.qrserver.com/v1/create-qr-code/?data=' . urlencode($cardUrl) . '&size=200x200';

        // Download QR code from API
        $response = Http::get($qrUrl);

        // Save locally
        Storage::disk('public')->put($filename, $response->body());
    }

    }
}
