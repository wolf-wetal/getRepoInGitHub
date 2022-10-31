<?php

/** @var yii\web\View $this */

/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\ActiveForm;
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
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user) { ?>
        <tr>
            <td><input type="text" id="inpt_name_<?php echo $user['id'] ?>"
                       onchange="inputSave(<?php echo $user['id'] ?>)" value="<?php echo $user["nickname"] ?>"></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>