<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 11:33
 */

namespace Tz\Skolkovo\Model;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}