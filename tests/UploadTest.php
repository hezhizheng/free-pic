<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 23:15
 * Created by PhpStorm.
 */

/**
 * ./vendor/bin/phpunit tests/UploadTest.php --filter test_cat_box_upload
 */
class UploadTest extends \PHPUnit\Framework\TestCase
{
    private $localPic = "D:\\e\\www\\hzz\\free-pic\\tests\\1.png";

    public function test_freePic_sm_upload()
    {
        $serve = \Hzz\FreePic::create('sm'); // img_kr or sm

        //$serve->proxy = 'http://127.0.0.1:58591';

        $u = $serve->upload($this->localPic);

        var_dump($u);
        $this->assertNotEmpty($u);
    }

    public function test_freePic_img_bb_upload()
    {
        $serve = \Hzz\FreePic::create('img_bb');

        $u = $serve->upload($this->localPic);

        var_dump($u);
        $this->assertNotEmpty($u);

    }

    public function test_freePic_img_host_upload()
    {
        $serve = \Hzz\FreePic::create('FreeImageHost');

        $u = $serve->upload($this->localPic);

        var_dump($u);
        $this->assertNotEmpty($u);

    }

    public function test_vim_cn_upload()
    {
        $serve = \Hzz\FreePic::create('VimCn');

        $u = $serve->upload($this->localPic);

        var_dump($u);
        $this->assertNotEmpty($u);

    }

    public function test_cat_box_upload()
    {
        $serve = \Hzz\FreePic::create('CatBox');

        $u = $serve->upload($this->localPic);

        var_dump($u);
        $this->assertNotEmpty($u);

    }
}