<?php
/**
 * Description:
 * Author: DexterHo <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 21:12
 * Created by PhpStorm.
 */

namespace Hzz;

/**
 * @property string $url 请求地址
 * @property string $filepath 图片路径
 * @property string $field_name 字段名称
 * @property array $headers 请求头
 * @property string $proxy 代理
 * Interface UploadPicInterface
 * @package Hzz
 */
interface UploadPicInterface
{
    const IMG_KR_URL = "https://imgkr.com/api/v2/files/upload";
    const SM_MS_URL = "https://sm.ms/api/v2/upload";

    public function upload($file);

    public function delete($file);
}