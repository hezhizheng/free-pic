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
        'img_bb' => 'Hzz\ImgBB',
        'free_image_host' => 'Hzz\FreeImageHost',
    ];

    /**
     * @param $type
     * @return mixed|UploadPicInterface
     */
    public static function create($type = 'img_kr')
    {
        $class = 'Hzz\\' . $type;
        if (isset(self::$map[$type])) {
            return new self::$map[$type];
        } elseif (class_exists($class)) {
            return new $class;
        } else {
            throw new \Exception("not support type: $type");
        }
    }
}