<?php

namespace Hzz\ServiceProvider;

use Hzz\ImgHost\FreeImageHost;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class FreeImageHostServiceProvider implements ServiceProviderInterface
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
        $pimple['freeImageHost'] = function ($pimple) {
            return new FreeImageHost($pimple->getConfig());
        };
    }
}