<?php

namespace backend\modules\usermanagement\controllers;

use Yii;
use backend\modules\usermanagement\models\UserDlt;
use backend\modules\usermanagement\models\UserDltSearch;
//use backend\modules\usermanagement\models\User;
use common\models\User;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserDltController implements the CRUD actions for UserDlt model.
 */
class UserDltController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserDlt models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserDltSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserDlt model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);
        return $this->render('view', [
                    'model' => $model,
                    'modelUser' => $modelUser,
        ]);
    }

    /**
     * Creates a new UserDlt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        
        $model = new UserDlt();
        $modelUser = new User();
        $modelUser->scenario = 'create';

        if ($modelUser->load(Yii::$app->request->post()) &&
                $model->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$modelUser, $model])) {
            $modelUser->setPassword($modelUser->password);
            $modelUser->generateAuthKey();
            $modelUser->user_type = 2;
            if ($modelUser->save()) {
                $model->user_id = $modelUser->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
                        'modelUser' => $modelUser,
            ]);
        }
    }

    /**
     * Updates an existing UserDlt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);
        $modelUser->scenario = 'update';

        if (
                $model->load(Yii::$app->request->post()) &&
                $modelUser->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$model, $modelUser])
        ) {
            $modelUser->setPassword($modelUser->password);
            $modelUser->generateAuthKey();
            $modelUser->user_type = 2;
            if ($modelUser->save()) {
                $model->user_id = $modelUser->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'modelUser' => $modelUser
            ]);
        }
    }

    /**
     * Deletes an existing UserDlt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserDlt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserDlt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UserDlt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelUser($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
