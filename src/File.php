<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 21:20
 * Created by PhpStorm.
 */

namespace Hzz;

class File
{
    public static function upload($file, $dir = "upload")
    {
        // 允许上传的图片后缀
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);     // 获取文件后缀名
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png"))
            && ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
            && in_array($extension, $allowedExts)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "错误：: " . $_FILES["file"]["error"] . "<br>";
            } else {

                // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];

            }
        } else {
            echo "非法的文件格式";
        }
    }

    public static function delete($file)
    {
        return @unlink($file);
    }

    public static function http($url, $filepath, $headers = null)
    {
        $post_data = array(
            "foo" => "bar",
            //要上传的本地文件地址
            "upload" => "@".'E:\www\project\dexter\packagist\free-pic\free-pic\1.png'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}