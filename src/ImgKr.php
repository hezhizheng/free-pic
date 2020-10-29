<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 22:25
 * Created by PhpStorm.
 */

namespace Hzz;

class ImgKr implements UploadPicInterface
{
    public function upload($file)
    {
        // is_file : file::upload() -> file::http() -> file::delete()
        // !is_file : file::http() -> file::delete()
        // is

        // TODO: Implement upload() method.
    }

    public function delete($file)
    {
        // TODO: Implement delete() method.
    }
}