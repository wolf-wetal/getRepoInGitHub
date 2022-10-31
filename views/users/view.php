
<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>


<table>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <?php var_dump($user["nickname"]); ?>
        <tr>
            <td><a href="<?php \yii\helpers\Url::to(['post/view']) ?>">Изменить</a></td>
            <td>Удалить</td>
            <td>Take mose</td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>