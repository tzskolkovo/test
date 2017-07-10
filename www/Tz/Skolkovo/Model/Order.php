<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 11:33
 */

namespace Tz\Skolkovo\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;

    protected $fillable = ['rate_id', 'name', 'lastname', 'phone', 'date_from', 'date_to'];

    protected $dates = [
        'date_from',
        'date_to',
        'created_at',
        'updated_at',
    ];

    /**
     * Format phone to store in database
     * @param $value
     */
    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = substr(preg_replace('/\D/', "", $value), -11);
    }

    public function rate()
    {
        return $this->belongsTo(Rate::class);
    }

    public function routeNotificationForMail()
    {
        return env('MAIL_DEBUG', 'tz.skolkovo@gmail.com');
    }
}