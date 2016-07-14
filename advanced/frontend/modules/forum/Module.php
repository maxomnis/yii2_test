<?php
namespace frontend\modules\forum;

use Yii;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        $this->params['foo'] = 'bar';
        // 从config.php加载配置来初始化模块
        \Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}