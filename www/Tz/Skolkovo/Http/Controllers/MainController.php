<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 11:59
 */

namespace Tz\Skolkovo\Http\Controllers;


use Tz\Skolkovo\Repository\RateRepository;

class MainController extends Controller
{
    public function index(RateRepository $rateRepository)
    {
        return view('skolkovo::index', [
            'rates' => $rateRepository->all(),
        ]);
    }
}