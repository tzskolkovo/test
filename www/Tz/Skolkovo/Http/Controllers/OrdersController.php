<?php
/**
 * Created by PhpStorm.
 * User: a6y
 * Date: 10.07.17
 * Time: 12:22
 */

namespace Tz\Skolkovo\Http\Controllers;


use Carbon\Carbon;
use Tz\Skolkovo\Events\NewOrderAdded;
use Tz\Skolkovo\Repository\OrderRepository;
use Tz\Skolkovo\Requests\StoreOrder;

class OrdersController extends Controller
{
    /**
     * @param StoreOrder $request
     * @param OrderRepository $orderRepository
     * @return
     */
    public function store(StoreOrder $request, OrderRepository $orderRepository)
    {
        $order = $orderRepository->create([
            'rate_id' => $request->input('type'),
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'date_from' => Carbon::createFromFormat(StoreOrder::DATE_FORMAT, $request->input('date-from')),
            'date_to' => Carbon::createFromFormat(StoreOrder::DATE_FORMAT, $request->input('date-to')),
        ]);
        if($order) {
            event(new NewOrderAdded($order));
            return $order->toJson();
        }
        return redirect()->back()->withErrors(['Ошибка']);
    }
}