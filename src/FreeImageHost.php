<?php
/**
 * Description:
 * Author: DexterHo <dexter.ho.cn@gmail.com>
 * Date: 2020/11/2
 * Time: 14:05
 * Created by PhpStorm.
 */

namespace Hzz;


class FreeImageHost implements UploadPicInterface
{
    /**
     * @param $file
     * @return mixed|string
     * @throws \Exception
     */
    public function upload($file)
    {
        $this->url = UploadPicInterface::FREE_IMAGE_HOST;
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
