<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 23.07.2018
 * Time: 21:02
 */

namespace app\controllers;


class CommentsController  extends Controller
{
    function actionIndex() {
        $comments = comments::find()
            ->orderBy(['created'=>'SORT_DESC'])
            ->all();

        return $this->render("index", ['comments' => $comments]);
    }

    function actionCreate() {
        $model = new comment();
        $status = "";
        if($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            $model->save();

        }

        return $this->render("create", ['model' => $model, 'status' => $status]);
    }
}