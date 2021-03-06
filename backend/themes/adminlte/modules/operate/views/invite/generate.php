<?php
/* @var $this yii\web\View */
/* @var $model \wocenter\backend\modules\operate\models\Invite */
/* @var $inviteTypeList array */

$this->title = '生成邀请码';
$this->params['breadcrumbs'][] = ['label' => Yii::t('wocenter/app', 'Invites'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['navSelectPage'] = '/operate/invite';
?>

<?= $this->render('_form', [
    'model' => $model,
    'inviteTypeList' => $inviteTypeList
]) ?>
