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

        //$serve->proxy = 'http://127.0.0.1:58591';

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);
    }

    public function test_freePic_img_bb_upload()
    {
        $serve = \Hzz\FreePic::create('img_bb');

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);

    }

    public function test_freePic_img_host_upload()
    {
        $serve = \Hzz\FreePic::create('FreeImageHost');

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);

    }

    public function test_vim_cn_upload()
    {
        $serve = \Hzz\FreePic::create('VimCn');

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);

    }

    public function test_cat_box_upload()
    {
        $serve = \Hzz\FreePic::create('CatBox');

        $u = $serve->upload("D:\\phpstudy_pro\\WWW\\org\\private-free-pic\\tests\\1.png");

        var_dump($u);
        $this->assertNotEmpty($u);

    }
}