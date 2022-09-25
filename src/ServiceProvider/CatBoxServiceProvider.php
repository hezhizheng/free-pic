<?php

namespace Hzz\ServiceProvider;

use Hzz\ImgHost\CatBox;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CatBoxServiceProvider implements ServiceProviderInterface
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
        $pimple['catBox'] = function ($pimple) {
            return new CatBox($pimple->getConfig());
        };
    }
}