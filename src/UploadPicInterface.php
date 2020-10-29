<?php
/**
 * Description:
 * Author: DexterHo <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 21:12
 * Created by PhpStorm.
 */

namespace Hzz;

interface UploadPicInterface
{
    public function upload($file);

    public function delete($file);
}