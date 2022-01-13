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
 * @property array $extra_params 其他额外参数
 * Interface UploadPicInterface
 * @package Hzz
 */
interface UploadPicInterface
{
    const SM_MS_URL = "https://sm.ms/api/v2/upload";
    const IMG_BB = "https://imgbb.com/json";
    const FREE_IMAGE_HOST = "https://freeimage.host/json";
    const VIM_CN = "https://img.vim-cn.com";
    const CAT_BOX = "https://catbox.moe/user/api.php";

    // 响应头为 text/html; 的接口
    const TEXT_HTML_MAP = [
        self::VIM_CN,
        self::CAT_BOX
    ];

    public function upload($file);

    public function delete($file);
}