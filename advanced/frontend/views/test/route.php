<?php use \yii\helpers\Url;?>
<?php
echo Url::toRoute(['site/index', 'src' => 'ref1', '#' => 'name']); //组合输出Url地址
?>