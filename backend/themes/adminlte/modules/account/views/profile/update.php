<?php
/* @var $this yii\web\View */
/* @var $model \wocenter\backend\modules\account\models\ExtendProfile */

$this->title = $model->profile_name;
$this->params['breadcrumbs'][] = ['label' => '扩展档案', 'url' => ['/account/profile']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['navSelectPage'] = '/account/profile';
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>