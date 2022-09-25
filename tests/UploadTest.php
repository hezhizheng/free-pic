<?php

/**
 * ./vendor/bin/phpunit tests/UploadTest.php --filter test_imgbb
 */
class UploadTest extends \PHPUnit\Framework\TestCase
{
    private $localPic = "D:\\e\\www\\hzz\\free-pic\\tests\\1.png";

    /**
     * ./vendor/bin/phpunit tests/UploadTest.php --filter test_imgbb
     * @return void
     */
    public function test_imgbb()
    {
        $config = [
            // 'app_key' => 'your-app-key',
            // 'secret' => 'your-secret',
            'debug' => true,
            'log' => [
                'name' => 'meituan',
                'file' => __DIR__ . '/meituan.log',
                'level' => 'debug',
                'permission' => 0777,
            ],
        ];

        $params = [
            "filepath" => $this->localPic,
        ];

        $freePic = new \Hzz\FreePic($config);

        $res = $freePic->imgBB->upload($params);
        $url = $freePic->imgBB->getUrl($res);
        var_dump($res);
        var_dump($url);
        die;
    }

    /**
     * ./vendor/bin/phpunit tests/UploadTest.php --filter test_freeImageHost
     * @return void
     */
    public function test_freeImageHost()
    {
        $config = [
            // 'app_key' => 'your-app-key',
            // 'secret' => 'your-secret',
            'debug' => true,
            'log' => [
                'name' => 'meituan',
                'file' => __DIR__ . '/meituan.log',
                'level' => 'debug',
                'permission' => 0777,
            ],
        ];

        $params = [
            "filepath" => $this->localPic,
        ];

        $freePic = new \Hzz\FreePic($config);

        $res = $freePic->freeImageHost->upload($params);
        $url = $freePic->freeImageHost->getUrl($res);
        var_dump($res);
        var_dump($url);
        die;
    }

    /**
     * ./vendor/bin/phpunit tests/UploadTest.php --filter sm
     * @return void
     */
    public function test_sm()
    {
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

        $params = [
            "filepath" => $this->localPic,
        ];

        $freePic = new \Hzz\FreePic($config);

        $res = $freePic->sm->upload($params);

        $url = $freePic->sm->getUrl($res);
        var_dump($res);
        var_dump($url);
        die;
    }

    /**
     * ./vendor/bin/phpunit tests/UploadTest.php --filter catBox
     * @return void
     */
    public function test_catBox()
    {
        $config = [
            'debug' => true,
            'log' => [
                'name' => 'catBox',
                'file' => __DIR__ . '/catBox.log',
                'level' => 'debug',
                'permission' => 0777,
            ],
        ];

        $params = [
            "filepath" => $this->localPic,
        ];

        $freePic = new \Hzz\FreePic($config);

        $res = $freePic->catBox->upload($params);
        $url = $freePic->catBox->getUrl($res);
        var_dump($res);
        var_dump($url);
    }
}