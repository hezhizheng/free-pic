<?php

namespace Hzz\ImgHost;

use Hzz\Api;
use Hzz\Exception\ImgHostResException;

class FreeImageHost extends Api
{
    const URL = 'https://freeimage.host/json';

    public function upload(array $params)
    {
        $http = $this->initHttpClient();

        $form_params = [
            "type" => "file",
            "action" => "upload"
        ];

        $files = [
            "source" => $params["filepath"]
        ];

        $response = $http->upload(self::URL, [], $files, $form_params);

        $result = json_decode(strval($response->getBody()), true);

        $this->checkAndThrow($result);

        $this->checkRes($result);

        return $result;
    }

    private function checkRes($res)
    {
        if (isset($res["error"])) {
            throw new ImgHostResException($res["error"]);
        }
    }

    public function getUrl($res)
    {
        return $res["image"]["display_url"] ?? "";
    }
}