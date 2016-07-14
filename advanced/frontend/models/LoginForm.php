<?php
namespace  app\models;

class LoginForm extends \yii\base\Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            // 在这里定义验证规则
        ];
    }
}