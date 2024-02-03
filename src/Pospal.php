<?php


namespace shaoyv8\Pospal;


use shaoyv8\Foundation\Foundation;

/**
 * Class Pospal
 * @package shaoyv8\Pospal
 *
 * @property \shaoyv8\Pospal\Ticket\Ticket $ticket
 * @property \shaoyv8\Pospal\Customer\Customer $customer
 * @property \shaoyv8\Pospal\Product\Product $product
 * @property \shaoyv8\Pospal\User\User $user
 * @property \shaoyv8\Pospal\StockTaking\StockTaking $stock_taking
 * @property \shaoyv8\Pospal\Order\Order $order
 * @property \shaoyv8\Pospal\StockFlow\StockFlow $stock_flow
 * @property \shaoyv8\Pospal\Cashier\Cashier $cashier
 */
class Pospal extends Foundation
{

    protected $providers = [
        Ticket\ServiceProvider::class,
        Customer\ServiceProvider::class,
        Product\ServiceProvider::class,
        User\ServiceProvider::class,
        StockTaking\ServiceProvider::class,
        Order\ServiceProvider::class,
        StockFlow\ServiceProvider::class,
        Cashier\ServiceProvider::class,
    ];

}