<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'defaultRoute' => 'site',

    /*
     * catchAll 路由（全拦截路由）

有时候，你会想要将你的 Web 应用临时调整到维护模式，所有的请求下都会显示相同的信息页。
    当然，要实现这一点有很多种方法。这里面最简单快捷的方法就是在应用配置中设置下 yii\web\Application::catchAll 属性：
     */
   // 'catchAll' => ['test/online'],
    /*
     * 引导启动组件

    上面提到一个应用组件只会在第一次访问时实例化， 如果处理请求过程没有访问的话就不实例化。
    有时你想在每个请求处理过程都实例化某个组件即便它不会被访问，
     可以将该组件ID加入到应用主体的 yii\base\Application::bootstrap 属性中。

    例如, 如下的应用主体配置保证了 log 组件一直被加载。

    [
        'bootstrap' => [
            // 将 log 组件 ID 加入引导让它始终载入
            'log',
        ],
        'components' => [
            'log' => [
                // "log" 组件的配置
            ],
        ],
    ]
     */
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',  //指定控制器的默认的命名空间
    'language'=>'en',
    'timeZone' => 'America/Los_Angeles',

    /*
     * 第一次使用以上表达式时候会创建应用组件实例， 后续再访问会返回此实例，无需再次创建。
     * 补充：请谨慎注册太多应用组件， 应用组件就像全局变量， 使用太多可能加大测试和维护的难度。
     *  一般情况下可以在需要时再创建本地组件。
     */
    'components' => [
        // 使用函数注册"search" 组件
        'search' => function () {
            return new app\components\SolrService;
        },

        'db'=>[
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=yii2advanced',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],

        /*
         * 这里的user 表示的用户组件，设置用户组件 yii\web\User ;
         * 该用户组件yii\web\User的属性identityClass，设置为common\models\User
         * common\models\User是一个实现了IdentityInterface接口的类
         */
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],

        
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
/*        'errorHandler' => [
            'errorAction' => 'site/error',
        ],*/
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */

/*        'controllerMap' => [
            [
                'account' => 'app\controllers\UserController',
                'article' => [
                    'class' => 'app\controllers\PostController',
                    'enableCsrfValidation' => false,
                ],
            ],
        ],*/
    ],
    'params' => $params,

    //包含多个模块
    'modules' => [
        // "booking" 模块以及对应的类
        'booking' => 'app\modules\booking\BookingModule',

        // "comment" 模块以及对应的配置数组
        'comment' => [
            'class' => 'app\modules\comment\CommentModule',
            'db' => 'db',
        ],

        'forum'=>[
            'class'=>'frontend\modules\forum\Module'
        ]
    ],


    /*
     * 应用在处理请求过程中会触发事件， 可以在配置文件配置事件处理代码
     * 下面是有关于事件的配置，具体的内容可以看手册
     */
    //在每个请求之前执行
    'on beforeRequest' => function ($event) {
        //var_dump($event);
       // echo "ehlo";exit;
    },

    //在每个action执行之前执行
    'on beforeAction' => function ($event) {
        //echo "aaaa";
    },
];
