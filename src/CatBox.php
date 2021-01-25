<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/11/1
 * Time: 12:33
 * Created by PhpStorm.
 */

namespace Hzz;


class CatBox implements UploadPicInterface
{
    /**
     * @param $file
     * @return mixed|string
     * @throws \Exception
     */
    public function upload($file)
    {
        $this->url = UploadPicInterface::CAT_BOX;
        $this->field_name = "fileToUpload";
        $this->filepath = $file;
        $this->extra_params = [
            'reqtype' => 'fileupload'
        ];
        $res = File::singleton()->http($this);
        return isset($res["image_url"]) ? $res["image_url"] : '';
    }

    public function delete($file)
    {
        // TODO: Implement delete() method.
    }
}