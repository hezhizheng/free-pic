<?php
/**
 * Description:
 * Author: DexterHo <dexter.ho.cn@gmail.com>
 * Date: 2020/10/30
 * Time: 11:46
 * Created by PhpStorm.
 */

namespace Hzz;

require '../vendor/autoload.php';

try {
    // 上传图片到本地
    $filepath = uploadFile();

    $config = [
        'sm' => [
            "token" => "Yuc4fb0BuwsOnd4y7R0zFp0tVGkxYgRa22"
        ],
        'debug' => true,
        'log' => [
            'name' => 'sm',
            'file' => __DIR__ . '/sm.log',
            'level' => 'debug',
            'permission' => 0777,
        ],
    ];

    $serve = new FreePic($config);
    $url = $serve->imgBB->upload(["filepath" => $filepath]);
    $url = $serve->imgBB->getUrl($url);
    if (!empty($url)) {
        echo "上传成功" . "</br>";
        echo "<img src='$url'>";
    } else {
        echo "上传失败" . PHP_EOL;
    }

} catch (\Exception $exception) {
    var_dump($exception->getMessage());
}


/**
 * 上传图片到本地
 * @param string $field_name 上传图片的字段名称
 * @param string $dir 指定路径
 * @return string
 * @throws \Exception
 */
function uploadFile($field_name = "file", $dir = '')
{
    // 允许上传的图片后缀
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES[$field_name]["name"]);
    $extension = end($temp);     // 获取文件后缀名
    if ((($_FILES[$field_name]["type"] == "image/gif")
            || ($_FILES[$field_name]["type"] == "image/jpeg")
            || ($_FILES[$field_name]["type"] == "image/jpg")
            || ($_FILES[$field_name]["type"] == "image/pjpeg")
            || ($_FILES[$field_name]["type"] == "image/x-png")
            || ($_FILES[$field_name]["type"] == "image/png"))
        && ($_FILES[$field_name]["size"] < 5242880)   // 小于 5M = 5*1024KB*1024B
        && in_array($extension, $allowedExts)) {
        if ($_FILES[$field_name]["error"] > 0) {
            throw new \Exception($_FILES[$field_name]["error"]);
        } else {

            if (empty($dir)) {
                $dir = $_SERVER['DOCUMENT_ROOT'] . '/pics/';
            }

            if (!is_dir($dir)) {
                mkdir($dir);
            }

            $destination = $dir . uniqid() . '.' . $extension;
            $move = move_uploaded_file($_FILES[$field_name]["tmp_name"], $destination);

            if ($move) {
                return $destination;
            } else {
                throw new \Exception("上传失败！");
            }
        }
    } else {
        throw new \Exception("非法的文件格式");
    }
}
