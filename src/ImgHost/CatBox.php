<?php

namespace Hzz\ImgHost;

use Hzz\Api;
use Hzz\Exception\ImgHostResException;

class CatBox extends Api
{
    const URL = 'https://catbox.moe/user/api.php';

    public function upload(array $params)
    {
        $http = $this->initHttpClient();

        $form_params = [
            'reqtype' => 'fileupload'
        ];

        $files = [
            "fileToUpload" => $params["filepath"]
        ];

        $response = $http->upload(self::URL, [], $files, $form_params);

        $result = json_decode(strval($response->getBody()), true);

        $this->checkRes($result);

        return $result;
    }

    private function checkRes($res)
    {
        if (strpos($res, 'https') === false) {
            throw new ImgHostResException($res);
        }
    }

    public function getUrl($res)
    {
        return $res;
    }
}