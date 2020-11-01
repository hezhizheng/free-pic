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
        'img_bb' => 'Hzz\ImgBB',
    ];

    /**
     * @param $type
     * @return mixed|UploadPicInterface
     */
    public static function create($type = 'img_kr')
    {
        return new self::$map[$type];
    }
}