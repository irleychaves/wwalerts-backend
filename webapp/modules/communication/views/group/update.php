<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model webapp\modules\communication\models\Group */

$this->title = Yii::t('translation', 'update_title', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = Yii::t('translation', 'menu.administration_menu_label');
$this->params['breadcrumbs'][] = Yii::t('translation', 'menu.communication_menu_label');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translation', 'Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('translation', 'Update');
?>
<div class="group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
