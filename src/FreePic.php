<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 22:28
 * Created by PhpStorm.
 */

namespace Hzz;


class FreePic
{
    private static $map = [
        'sm' => 'Hzz\Sm',
        'img_kr' => 'Hzz\ImgKr',
    ];

    /**
     * @param $type
     * @return mixed|Sm|ImgKr
     */
    public static function create($type)
    {
        return new self::$map[$type];
    }
}