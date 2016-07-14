<?php
/**
 * 功能描述:
 * 创建自己的过滤器
 * @author zhangjun <zhangjun1@yy.com>
 * @version 1.0
 * Date: 2016/7/13 9:50
 */

namespace frontend\components;

use Yii;
use yii\base\ActionFilter;

class MyFilter extends ActionFilter
{
    private $_startTime;

    public function beforeAction($action)
    {
        // 动作被执行之前应用的逻辑
        //	return true; // 如果动作不应被执行，此处返回 false

        //return false;

        echo "in MyFilter beforeAction";
        //return false;
        return parent::beforeAction($action);
    }

    public function afterAction($action, $result)
    {
        echo "in MyFilter afterAction";
        return parent::afterAction($action, $result);
    }
}