## free-pic 免费图床 

> [体验demo](http://free-pic.hzz.cool)

> [github 地址](https://github.com/hezhizheng/free-pic)

> [packagist 地址](https://packagist.org/packages/hzz/free-pic)


## feature
- 三无图床（无存储限制 | 无需上传凭证 | 无同源跨域检测）
- 支持使用代理、简单易用、方便扩展
- 支持 "gif", "jpeg", "jpg", "png" 图片格式

## 支持图床
- [sm.ms](https://sm.ms/)
- [imgKr](https://imgkr.com/)
- [imgBB](https://imgbb.com/upload)
- [FreeImageHost](https://freeimage.host/)
- ...找到其他三无图床就再扩展

## 使用
下载安装
```
composer require "hzz/free-pic @dev"
```

上传图片到本地
```
...
use Hzz\File;

// 上传图片到本地 , 也可使用其他上传类，最终获取图片的绝对路径即可
$fileEntity = File::singleton();
// $field_name 上传图片的字段名称 默认 file
// $dir 指定上传路径 默认 ''
$filepath = $fileEntity->upload($field_name,$dir); 
```

上传图片到第三方图床
```
// 通过不同类型初始化实现类
// 支持参数类型(img_kr、sm、img_bb、free_image_host) or 直接使用文件类名 e.g:ImgKr、Sm、ImgBB、FreeImageHost
$serve = FreePic::create('img_kr'); 
// $serve->proxy = 'http://127.0.0.1:58591'; // 按需设置代理、sm.ms在移动网络下可能需要fq
$url = $serve->upload($filepath);
```

删除本地图片
```
$fileEntity->delete($filepath);
```
详细用法可参考 tests 用例

## License
[MIT](./LICENSE.txt)
