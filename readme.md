## free-pic 一个第三方免费图床扩展包 

> [体验demo](http://free-pic.hzz.cool)

> [github 地址](https://github.com/hezhizheng/free-pic)

> [packagist 地址](https://packagist.org/packages/hzz/free-pic)


## feature
- 三无图床（"无存储限制" | "无需上传凭证" | "无同源跨域检测"）
- 简单易用、方便扩展
- 支持 常见 "gif", "jpeg", "jpg", "png" 图片格式

## 支持图床
- [sm.ms](https://smms.app/)
- [imgBB](https://imgbb.com/upload)
- [FreeImageHost](https://freeimage.host/)
- [CatBox](https://catbox.moe)
- ...找到其他三无图床就再扩展

## 使用
下载安装
```
composer require hzz/free-pic dev-master
```

上传图片到第三方图床 (完整调用过程)
```php

// 配置项
$config = [
    'sm' => [ // sm 需要token ，不使用可无须配置
        "token" => "Yuc4fb0BuwsOnd4y7R0zFp0tVGkxYgRa22"
    ],
    'debug' => true,
    'log' => [
        'name' => 'img_hosting',
        'file' => __DIR__ . '/img_hosting.log',
        'level' => 'debug',
        'permission' => 0777,
    ],
];

$params = [
    "filepath" => "图片的绝对路径",
];
// 实例化
$freePic = new \Hzz\FreePic($config);
// 上传 , 同理 可用 ->sm , ->freeImageHost , ->catBox 调用对应的服务
$res = $freePic->imgBB->upload($params); // 这里返回的是对应图床服务器返回的上传结果数据。
// getUrl方法 可获取实际
$url = $freePic->imgBB->getUrl($res);
```

详细用法可参考 [tests](./tests/UploadTest.php) 用例 或 [upload.php](./tests/upload.php)

## License
[MIT](./LICENSE.txt)
