<?php

namespace app\controllers\admin;


use app\models\app\Purchase;
use Yii;
use yii\web\Controller;


class PurchaseController extends Controller
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

        $model = new Purchase();
        return $this->render('index', compact('model'));
    }

    public function actionCreate()
    {

        $model = new Purchase();
        if ($form = \Yii::$app->request->post()) {
            $model->load($form);
            $model->user_id =Yii::$app->user->id;
            $model->created_at = time();
            if ($form['Purchase']['status'] === '') {
                $model->status = Purchase::STATUS_DRAFT;
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "New purchase created.");
                return $this->redirect("/admin/purchase");
            }
            Yii::$app->session->setFlash('error', "Something went wrong.");
        }
        return $this->render('create', ['model' => $model]);

    }

    public function actionUpdate($id)
    {
        $model = Purchase::find()->where(['id' => $id])->one();

        if ($form = \Yii::$app->request->post()) {
            $model->load($form);
            $model->updated_at = time();
            if ($model->save()) {
                Yii::$app->session->setFlash('success', "Purchase updated success.");
                return $this->redirect("/admin/purchase");
            }
            Yii::$app->session->setFlash('error', "Something went wrong.");
        }

        return $this->render('create', ['model' => $model]);

    }

    public function actionDelete($id)
    {
        $model = Purchase::find()->where(['id' => $id])->one();
        if ($model->delete()) {

            Yii::$app->session->setFlash('success', "Purchase deleted.");
            return $this->redirect("/admin/purchase");
        }
        Yii::$app->session->setFlash('error', "Something went wrong.");
    }
}
