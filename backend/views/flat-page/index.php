<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use dmstr\widgets\Alert;


$this->title = Yii::t('backend', 'Pages');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Alert::widget() ?>

<p class="pull-left">
    <?= Html::a('<i class="glyphicon glyphicon-plus"></i> ' .
        Yii::t('backend/views', 'Add New Page'),
        'create', [
                'class' => 'btn btn-primary',
    ]); ?>
</p>

<div class="clearfix"></div>

<?= GridView::widget([
    'dataProvider' => $flatPageProvider,
    'filterModel' => $flatPageSearch,
    'id' => 'flat-pages-grid',
    'tableOptions' => ['class' => 'table table-striped table-bordered box box-primary'],
    'columns' => [
        [
            'attribute' => 'url',
            'format' => 'raw',
            'value' => function($flatPage){
                return Html::a($flatPage->url, ['update', 'id'=>$flatPage->id]);
            }
        ],
        'title',
        'created_at:datetime',
        'updated_at:datetime',
        [
            'class' => ActionColumn::className(),
            'template' => '{update}',
        ],
    ]
]);
?>