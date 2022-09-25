<?php

namespace Hzz\ServiceProvider;

use Hzz\ImgHost\ImgBB;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ImgBBServiceProvider implements ServiceProviderInterface
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
        $pimple['imgBB'] = function ($pimple) {
            // var_dump($pimple,$pimple->getConfig());die;
            // return new Test($pimple['config']->get('app_key'), $pimple['config']->get('secret'));
            return new ImgBB($pimple->getConfig());
        };
    }
}