<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 11:35
 */

namespace Tz\Skolkovo\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Tz\Skolkovo\Model\Order;

class OrderRepository extends BaseRepository
{
    public function model()
    {
        return Order::class;
    }
}