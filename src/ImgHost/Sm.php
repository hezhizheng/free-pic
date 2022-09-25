<?php

namespace Hzz\ImgHost;

use Hzz\Api;
use Hzz\Exception\ImgHostResException;

class Sm extends Api
{
    const URL = 'https://smms.app/api/v2/upload';

    public function upload(array $params)
    {
        $http = $this->initHttpClient();

        $queries = [];

        $files = [
            "smfile" => $params["filepath"]
        ];

        $response = $http->upload(self::URL, $queries, $files);

        $result = json_decode(strval($response->getBody()), true);

        $this->checkAndThrow($result);

        $this->checkRes($result);

        return $result;
    }

    private function checkRes($res)
    {
        if (isset($res["success"]) &&
            $res["success"] === false &&
            isset($res["code"])  && $res["code"] != "image_repeated") {
            throw new ImgHostResException($res["message"] ?? "sm 未知错误");
        }
    }

    public function getUrl($res)
    {
        $url = $res["data"]["url"] ?? null;
        $images = $res["images"] ?? null;
        return $url ?? $images;
    }
}