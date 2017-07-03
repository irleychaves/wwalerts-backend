<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\alert\models\Risk */

$this->title = Yii::t('translation', 'update_title', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('translation', 'risks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('translation', 'Update');
?>
<div class="risk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>