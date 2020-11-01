<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/11/1
 * Time: 12:33
 * Created by PhpStorm.
 */

namespace Hzz;


class ImgBB implements UploadPicInterface
{
    /**
     * @param $file
     * @return mixed|string
     * @throws \Exception
     */
    public function upload($file)
    {
        $this->url = UploadPicInterface::IMG_BB;
        $this->filepath = $file;
        $this->field_name = 'source';
        $this->extra_params = [
            'type' => 'file',
            'action' => 'upload'
        ];

        $res = File::singleton()->http($this);

        return isset($res["image"]["display_url"]) ? $res["image"]["display_url"] : '';
    }

    public function delete($file)
    {
        // TODO: Implement delete() method.
    }
}