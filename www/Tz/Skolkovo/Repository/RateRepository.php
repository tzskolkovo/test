<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 11:37
 */

namespace Tz\Skolkovo\Repository;

use Prettus\Repository\Eloquent\BaseRepository;
use Tz\Skolkovo\Model\Rate;

class RateRepository extends BaseRepository
{
    public function model()
    {
        return Rate::class;
    }
}