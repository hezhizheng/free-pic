<?php
/**
 * Description:
 * Author: DexterHo <dexter.ho.cn@gmail.com>
 * Date: 2020/10/30
 * Time: 11:46
 * Created by PhpStorm.
 */

namespace Hzz;

use Hzz\File;

require '../vendor/autoload.php';

try {
    // 上传图片到本地
    $fileEntity = File::singleton();
    $filepath = $fileEntity->upload();

    // 上传图片到第三方图床
//    $serve = FreePic::create('sm'); // 通过不同类型初始化实现类 img_kr or sm
//    $serve->proxy = 'http://127.0.0.1:58591';

    $serve = FreePic::create('img_kr');
    $url = $serve->upload($filepath);

    // 删除存在本地的图片，不调用则图片会留在本地服务器上
    $fileEntity->delete($filepath);

    if ( !empty($url) )
    {
        echo "上传成功"."</br>";
        echo "<img src='$url'>";
    }else{
        echo "上传失败".PHP_EOL;
    }

} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}

