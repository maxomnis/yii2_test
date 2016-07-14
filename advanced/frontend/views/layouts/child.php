<?php
/**
 * 功能描述:
 *
 * @author zhangjun <zhangjun1@yy.com>
 * @version 1.0
 * Date: 2016/7/12 19:28
 */
//布局嵌套，包括进来base布局
$this->beginContent('@app/views/layouts/base.php');
?>
<body>
in child layout
<?= $content ?>
</body>
<?php $this->endContent(); ?>

 