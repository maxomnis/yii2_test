<?php
/*

该属性为一个数组，指定可以全局访问的参数， 代替程序中硬编码的数字和字符， 应用中的参数定义到一个单独的文件并随时可以访问是一个好习惯。 例如用参数定义缩略图的长宽如下：

[
    'params' => [
        'thumbnail.size' => [128, 128],
    ],
]
然后简单的使用如下代码即可获取到你需要的长宽参数：

$size = \Yii::$app->params['thumbnail.size'];
$width = \Yii::$app->params['thumbnail.size'][0];

 */
return [
    'adminEmail' => 'admin@example.com',
];
