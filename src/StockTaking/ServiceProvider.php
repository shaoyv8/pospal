<?php


namespace shaoyv8\Pospal\StockTaking;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['stock_taking'] = function ($pimple) {
            return new StockTaking($pimple['config']->get('app_id'), $pimple['config']->get('app_key'), $pimple['config']->get('url'));
        };
    }
}