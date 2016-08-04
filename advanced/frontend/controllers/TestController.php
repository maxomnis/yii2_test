<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\PageCache;
use yii\caching\DbDependency;
use app\models\LoginForm;


class TestController extends Controller
{

  /*
  使用自定义布局
   public $layout='child';

    public function actionLayout()
    {
      return $this->render('layout');
    }

    */




    /*
     * 使用数据块
     * 数据块可以在一个地方指定视图内容在另一个地方显示，通常和布局一起使用， 例如，可在内容视图中定义数据块在布局中显示它。
       调用 yii\base\View::beginBlock() 和 yii\base\View::endBlock() 来定义数据块， 使用 $view->blocks[$blockID] 访问该数据块，
       其中 $blockID 为定义数据块时指定的唯一标识ID。

       其实就是在布局文件中定义一个块的占位符ID，如果在view文件里面也定义了这个占位符ID，那么就用view的内容替换布局文件的占位符内容
        public $layout='block';
        public function actionBlock()
        {
            return $this->render('block');
        }
     */

/*
    public function actions()
    {
        return [
            'page' => [
                'class' => 'yii\web\ViewAction',      //包含多个静态页面的写法
            ],
        ];
    }
*/

    /*
     * 过滤器的使用
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'frontend\components\MyFilter',  //自定义过滤器
                'only' => ['index', 'view'],        //在index,view方法执行之前，先执行MyFilter
            ],

             //使用页面缓存过滤器
            'pageCache' => [
                'class' => PageCache::className(),
                'only' => ['index'],
                'duration' => 60,
                'dependency' => [
                    'class' => DbDependency::className(),
                    'sql' => 'SELECT COUNT(*) FROM post',
                ],
                'variations' => [
                    \Yii::$app->language,
                ]
            ],
        ];
    }


    public function actionView()
    {
        echo "test filter";
    }


    public function actionWidget()
    {
        return $this->render('widget');
    }

    public function actionSource()
    {
        return $this->render('source');
    }

    public function actionOnline()
    {
        return $this->render('online');

    }

    /*
     * 测试请求操作
     */
    public function actionTestRequest()
    {
        $request = Yii::$app->request;

        $get = $request->get();

        $id = $request->get('id');

        $id2 = $request->get('id', 1);

        $post = $request->post();

        $id3 = $request->post('name');
        $id4 = $request->port('name', 'jack');

        if($request->isAjax){

        }

        if($request->isPost){

        }
    }

    /*
     * 测试响应
     */
    public function actionTestResponse()
    {
        Yii::$app->response->statusCode=405;
        Yii::$app->response->send();
    }

    public function actionSession()
    {
        Yii::error("sffff");
        $session = Yii::$app->session;
        // 如下代码会生效：
        $session['captcha'] = [
            'number' => 5,
            'lifetime' => 3600,
        ];

        // 从"response"组件中获取cookie 集合(yii\web\CookieCollection)
        $cookies = Yii::$app->response->cookies;

        // 在要发送的响应中添加一个新的cookie
        $cookies->add(new \yii\web\Cookie([
            'name' => 'language',
            'value' => 'zh-CN',
        ]));

        $language = $cookies->getValue('language');

        var_dump($language);


    }


    public function actionLogin()
    {
        //echo \Yii::$app->controller->action->id;exit;
        $model = new LoginForm();
        //$a =  $this->render('login', array('model'=>$model));

        //var_dump($a);

        return $this->render('login', array('model'=>$model));
    }


    public function actionArth()
    {
        $identity = Yii::$app->user->identity;
        var_dump($identity);exit;
    }

    public function actionXss()
    {
        echo \yii\helpers\HtmlPurifier::process("<script>alert('Hello!');</script>"); //process会过滤掉所有的html标签,所以这里输出空
        echo \yii\helpers\Html::encode("<script>alert('Hello!');</script>"); //原样输出内容,js脚本不会被执行
    }


    public function actionCache()
    {

    }


    /*
     * 使用助手类生成页面
     */
    public function actionHtml()
    {
       return  $this->render('html');
    }

    /*
     * 路由助手类
     */
    public function actionRoute()
    {
        return $this->render('route');
    }

    /*
     * 自定义事件处理，
     */
    public function actionEvent()
    {
        $test = new \frontend\components\MyEvent;
        $test->bar();
    }


/*    public function actionbehavior()
    {
        echo $this->
    }
*/


    public function actionBody()
    {
       return $this->render('body');
    }

    

}