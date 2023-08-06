<?php

namespace app\controllers\admin;

use app\models\app\Appellation;
use Yii;
use yii\web\Controller;


class AppellationController extends Controller
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

    public function actionIndex()
    {
        $model = new Appellation();

        return $this->render('index', compact('model'));
    }

    public function actionCreate()
    {

        $model = new Appellation();
        if ($form = \Yii::$app->request->post()) {

            $model->load($form);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "New appellation created.");
                return $this->redirect("/admin/appellation");
            }
            Yii::$app->session->setFlash('error', "Something went wrong.");
        }
        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id)
    {
        $model = Appellation::find()->where(['id' => $id])->one();

        if ($form = \Yii::$app->request->post()) {
            $model->load($form);
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Appellation updated success.");
                return $this->redirect("/admin/appellation");
            }
            Yii::$app->session->setFlash('error', "Something went wrong.");
        }

        return $this->render('create', ['model' => $model]);

    }
    public function actionDelete($id)
    {
        $model = Appellation::find()->where(['id' => $id])->one();
        if ($model->delete()) {

            Yii::$app->session->setFlash('success', "Appellation deleted.");
            return $this->redirect("/admin/appellation");
        }
        Yii::$app->session->setFlash('error', "Something went wrong.");
    }

}
