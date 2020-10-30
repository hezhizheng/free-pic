<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 22:25
 * Created by PhpStorm.
 */

namespace Hzz;

/**
 * Class ImgKr
 * @package Hzz
 */
class ImgKr implements UploadPicInterface
{
    /**
     * @param $file
     * @return array|mixed
     * @throws \Exception
     */
    public function upload($file)
    {
        $this->url = UploadPicInterface::IMG_KR_URL;
        $this->filepath = $file;
        $this->headers = [
            'Referer: https://imgkr.com/'
        ];

        $res = File::singleton()->http($this);
        return isset($res["data"]) ? $res["data"] : '';
    }

    public function delete($file)
    {
        // TODO: Implement delete() method.
    }
}