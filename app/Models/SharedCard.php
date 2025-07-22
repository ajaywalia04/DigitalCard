<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SharedCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'my_card_id',
        'device_info',
    ];

    protected $appends = ['browser','operating_system','device_type'];

##########################################################
##         Relation
##########################################################

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function myCard()
    {
        return $this->belongsTo(MyCard::class);
    }

##########################################################
##          Method
##########################################################

    public static function storeDataIfUserNotLoggedIn(){
        $myCard = MyCard::where('uuid',session()->pull('myCard'))->first();
        $user = auth()->user();
        $shared = SharedCard::where('user_id', $user->id)
                ->where('my_card_id', $myCard->id)
                ->first();
        if($shared){

        }else{
            $shared = $user->sharedCards()->create([
                'my_card_id'       => $myCard->id,
                'device_info'     => request()->userAgent(),
            ]);
        }
    }

##########################################################
##          Getters
##########################################################
    public function getBrowserAttribute()
    {
        $ua = $this->device_info;

        if (Str::contains($ua, 'Edg')) {
            return 'Microsoft Edge';
        } elseif (Str::contains($ua, 'Chrome')) {
            return 'Google Chrome';
        } elseif (Str::contains($ua, 'Firefox')) {
            return 'Mozilla Firefox';
        } elseif (Str::contains($ua, 'Safari') && !Str::contains($ua, 'Chrome')) {
            return 'Safari';
        }

        return 'Unknown Browser';
    }

    // Accessor to get operating system
    public function getOperatingSystemAttribute()
    {
        $ua = $this->device_info;

        if (Str::contains($ua, 'Windows NT 10.0')) {
            return 'Windows 10';
        } elseif (Str::contains($ua, 'Windows NT 6.1')) {
            return 'Windows 7';
        } elseif (Str::contains($ua, 'Macintosh')) {
            return 'macOS';
        } elseif (Str::contains($ua, 'Android')) {
            return 'Android';
        } elseif (Str::contains($ua, 'iPhone')) {
            return 'iOS';
        }

        return 'Unknown OS';
    }

    // Accessor to get device type
    public function getDeviceTypeAttribute()
    {
        $ua = $this->device_info;

        if (Str::contains($ua, ['Mobile', 'Android', 'iPhone'])) {
            return 'Mobile';
        } elseif (Str::contains($ua, ['iPad', 'Tablet'])) {
            return 'Tablet';
        }

        return 'Desktop';
    }
}
