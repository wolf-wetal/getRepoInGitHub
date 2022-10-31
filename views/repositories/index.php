<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;

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
    <thead>
    <tr>
        <th>Никнейм</th>
        <th>Директория</th>
        <th>Дата</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($usersData as $userData) { ?>
        <tr>
            <td><?php echo $userData['nickname'] ?></td>
            <td><?php echo $userData['url_repository'] ?></td>
            <td><?php echo $userData['date'] ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>