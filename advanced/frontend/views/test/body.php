<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $content string 字符串 */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <header>My Companysssssssssssssssssssss</header>
    <footer>&copy; 2014 by My Company</footer>
</body>
</html>
<?php $this->endPage() ?>