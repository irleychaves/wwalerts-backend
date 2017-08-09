<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model webapp\modules\communication\models\TriggerGroupFilter */
$this->title = Yii::t('translation', 'triggergroupfilter.create_title');
$this->params['breadcrumbs'][] = Yii::t('translation', 'menu.communication_menu_label');
$this->params['breadcrumbs'][] = ['label' => Yii::t('translation', 'workgroups'), 'url' => ['/operative/workgroups/index']];
$this->params['breadcrumbs'][] = ['label' => $workgroup->name, 'url' => ['/communication/group/view', 'id' => $group->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trigger-group-filter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
	'group' => $group,
    ]) ?>

</div>