<?php

namespace Hzz;

use Hanson\Foundation\Foundation;
use Hzz\ImgHost\CatBox;
use Hzz\ImgHost\FreeImageHost;
use Hzz\ImgHost\ImgBB;
use Hzz\ImgHost\Sm;
use Hzz\ServiceProvider\CatBoxServiceProvider;
use Hzz\ServiceProvider\FreeImageHostServiceProvider;
use Hzz\ServiceProvider\ImgBBServiceProvider;
use Hzz\ServiceProvider\SmServiceProvider;

/**
 * @property  ImgBB $imgBB
 * @property  FreeImageHost $freeImageHost
 * @property  Sm $sm
 * @property  CatBox $catBox
 */
class FreePic extends Foundation
{
    protected $providers = [
        ImgBBServiceProvider::class,
        FreeImageHostServiceProvider::class,
        SmServiceProvider::class,
        CatBoxServiceProvider::class,
    ];
}