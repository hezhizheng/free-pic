<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 21:20
 * Created by PhpStorm.
 */

namespace Hzz;

/**
 * Class File
 * @package Hzz
 */
class File
{
    private static $file = null;

    /**
     * @return File|null
     */
    public static function singleton()
    {
        if (self::$file === null) {
            self::$file = new self();
        }
        return self::$file;
    }

    /**
     * 上传图片到本地
     * @param string $field_name 上传图片的字段名称
     * @param string $dir 指定路径
     * @return string
     * @throws \Exception
     */
    public function upload($field_name = "file", $dir = '')
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

    /**
     * 删除本地图片
     * @param $file
     * @return bool
     */
    public function delete($file)
    {
        return @unlink($file);
    }

    /**
     * 向第三方图床发起上传图片请求
     * @param UploadPicInterface $entity
     * @return array|mixed
     * @throws \Exception
     */
    public function http(UploadPicInterface $entity) // $entity
    {
        $field_name = isset($entity->field_name) ? $entity->field_name : 'file';
        $url = isset($entity->url) ? $entity->url : '';
        $headers = isset($entity->headers) ? $entity->headers : [];
        $filepath = isset($entity->filepath) ? $entity->filepath : '';
        $proxy = isset($entity->proxy) ? $entity->proxy : '';
        $extra_params = isset($entity->extra_params) ? $entity->extra_params : [];

        try {
            $ch = curl_init();

            // 版本兼容处理
            if (class_exists('\CURLFile')) {// 这里用特性检测判断php版本
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
                $data = array($field_name => new \CURLFile(realpath($filepath)));//>=5.5
            } else {
                if (defined('CURLOPT_SAFE_UPLOAD')) {
                    curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
                }
                $data = array($field_name => '@' . realpath($filepath));//<=5.5
            }

            if (is_array($extra_params) && count($extra_params)) {
                $data = array_merge($data, $extra_params);
            }

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            //跳过SSL验证
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '0');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '0');

            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            if (!empty($proxy)) {
                curl_setopt($ch, CURLOPT_PROXY, $proxy);
            }

            $output = curl_exec($ch);
            $error = curl_error($ch);

            if (!empty($error)) {
                return [
                    'curl_error' => $error
                ];
            }

            curl_close($ch);

            $res_ary = json_decode($output, true);

            if ( !is_array($res_ary) )
            {
                throw new \Exception((string) $output);
            }
            return $res_ary;
        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

}