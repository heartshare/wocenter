<?php
namespace wocenter\backend\themes\adminlte\dispatch\account\tag;

use wocenter\backend\modules\account\models\TagSearch;
use wocenter\backend\themes\adminlte\components\Dispatch;
use Yii;

/**
 * Class Index
 *
 * @package wocenter\backend\themes\adminlte\dispatch\account\tag
 */
class Index extends Dispatch
{

    /**
     * @param integer $pid
     *
     * @return string|\yii\web\Response
     */
    public function run($pid = 0)
    {
        $searchModel = new TagSearch();
        $dataProvider = $searchModel->search(Yii::$app->getRequest()->getQueryParams());

        if ($searchModel->message) {
            $this->error($searchModel->message, '', 2);
        }

        $breadcrumbs = $searchModel->getBreadcrumbs($pid, '标签列表', '/account/tag');

        return $this->assign([
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pid' => $pid,
            'breadcrumbs' => $breadcrumbs,
            'title' => $breadcrumbs[$pid]['label'],
        ])->display();
    }

}
