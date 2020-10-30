<?php
/**
 * Description:
 * Author: DexterHo(HeZhiZheng) <dexter.ho.cn@gmail.com>
 * Date: 2020/10/29
 * Time: 23:15
 * Created by PhpStorm.
 */

class UploadTest extends \PHPUnit\Framework\TestCase
{
    public function test_freePic_sm_upload()
    {
        $serve = \Hzz\FreePic::create('sm'); // img_kr or sm

        $serve->proxy = 'http://127.0.0.1:58591';

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);
    }

    public function test_freePic_img_kr_upload()
    {
        $serve = \Hzz\FreePic::create('img_kr'); // img_kr or sm

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);

    }
}