<?php
namespace wocenter\backend\themes\adminlte\dispatch\account\admin;

use wocenter\backend\themes\adminlte\components\Dispatch;
use wocenter\models\BackendUser;
use wocenter\traits\LoadModelTrait;
use Yii;

/**
 * Class Update
 *
 * @package wocenter\backend\themes\adminlte\dispatch\account\admin
 */
class Update extends Dispatch
{

    use LoadModelTrait;

    /**
     * @param integer $id
     *
     * @return string|\yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     */public function run($id)
    {
        /** @var BackendUser $model */
        $model = $this->loadModel(BackendUser::className(), $id, true, [
            'scenario' => BackendUser::SCENARIO_UPDATE
        ]);
        $request = Yii::$app->getRequest();
        if ($request->getIsPost()) {
            if ($model->load($request->getBodyParams()) && $model->save()) {
                $this->success('', ["/{$this->controller->getUniqueId()}"]);
            } else {
                $this->error($model->message);
            }
        }

        return $this->assign([
            'model' => $model,
            'showStatus' => !($model->user_id == 1 || $model->user_id == Yii::$app->getUser()->getId()),
        ])->display();
    }

}
