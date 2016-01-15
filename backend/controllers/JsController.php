<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class JsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionTest()
    {
        return $this->render('index');
    }

}
