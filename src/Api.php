<?php

namespace Hzz;

use GuzzleHttp\Client;
use Hanson\Foundation\AbstractAPI;
use Hanson\Foundation\Http;
use Hzz\Exception\ImgHostResException;

/**
 * Api 基类，所有的实体/业务类 都继承该类
 */
class Api extends AbstractAPI
{
    private $smToken;

    public function __construct(array $config)
    {
        $this->smToken = $config["sm"]["token"] ?? null;
    }

    /**
     * 初始化 http 请求
     * @return Http
     */
    public function initHttpClient()
    {
        return $this->getHttp()->setClient(new Client([
            'verify' => false
        ]));
    }

    /**
     * Check the array data errors, and Throw exception when the contents contains error.
     *
     * @param array $content
     *
     * @throws \Exception
     */
    protected function checkAndThrow($content)
    {
        if (!$content) {
            throw new ImgHostResException('invalid response.');
        }
    }

    public function middlewares()
    {
        if (!empty($this->smToken)) {
            $this->http->addMiddleware($this->headerMiddleware([
                'Authorization' => $this->smToken,
            ]));
        }
    }
}