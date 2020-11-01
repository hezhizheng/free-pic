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
 * Class Sm
 * @package Hzz
 */
class Sm implements UploadPicInterface
{
    /**
     * @param $file
     * @return array|mixed
     * @throws \Exception
     */
    public function upload($file)
    {
        $this->url = UploadPicInterface::SM_MS_URL;
        $this->field_name = 'smfile';
        $this->filepath = $file;

        $res = File::singleton()->http($this);

        if ( $res['code'] == 'success' )
        {
            $url = isset($res["data"]["url"]) ? $res["data"]["url"] : '';
        }else{ // 图片重复上传
            $url = isset($res["images"]) ? $res["images"] : '';
        }

        return $url;
    }

    public function delete($file)
    {
        // TODO: Implement delete() method.
    }
}