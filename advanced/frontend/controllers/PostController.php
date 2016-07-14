<?php
namespace frontend\controllers;

use Yii;
use app\models\Post;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{

   // public $layout = 'post';  指定布局  在控制器，appliction, 模块都可以配置自定义布局

    public function actionIndex()
    {
        echo "hello";
    }

    /*
     * 只有beforeAction返回了true后面的其他的action才会执行；
     * 比如，页面访问http://frontend.dev/index.php?r=post
     * 如果下面的beforeAction什么都不返回或者返回false, actionIndex是不会被执行的
     */
    public function beforeAction($action)
    {
        echo "in before action";
        return true;
    }

    //修改默认的action
    //public $defaultAction = 'home';
    /*
     * 独立操作

      独立操作通过继承yii\base\Action或它的子类来定义。
    例如Yii发布的yii\web\ViewAction和yii\web\ErrorAction 都是独立操作。
      要使用独立操作，需要通过控制器中覆盖yii\base\Controller::actions()方法在action map中申明， 如下例所示
     */
    public function actions()
    {
        return [
            // 用类来申明"error" 操作
            'error' => 'yii\web\ErrorAction',

            // 用配置数组申明 "view" 操作
            'view' => [
                'class' => 'yii\web\ViewAction',
                'viewPrefix' => '',
            ],
        ];
    }


    public function actionView($id)
    {
        $model = Post::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionCreate()
    {
        $model = new Post;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}