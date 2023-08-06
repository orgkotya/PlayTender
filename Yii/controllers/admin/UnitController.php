<?php

namespace app\controllers\admin;

use app\models\app\Unit;
use yii\web\Controller;


class UnitController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                'only' => ['create', 'update','index', 'delete'],
                'rules' => [

                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
    }
    public function actionCreate()
    {
        $model = new Unit();
        if ($form = \Yii::$app->request->post()) {

            $model->load($form);
            if ($model->save()) {
                return $this->redirect("/admin/appellation");
            }
        }
        return $this->render('create', ['model' => $model]);

    }

}
