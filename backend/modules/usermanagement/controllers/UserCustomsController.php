<?php

namespace backend\modules\usermanagement\controllers;

use Yii;
use backend\modules\usermanagement\models\UserCustoms;
use backend\modules\usermanagement\models\UserCustomsSearch;
use common\models\User;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use backend\modules\configuration\models\BorderCheckpoint;

/**
 * UserCustomsController implements the CRUD actions for UserCustoms model.
 */
class UserCustomsController extends Controller {

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
     * Lists all UserCustoms models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserCustomsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserCustoms model.
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
     * Creates a new UserCustoms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new UserCustoms();
        $modelUser = new User();
        $modelUser->scenario = 'create';

        if ($modelUser->load(Yii::$app->request->post()) &&
                $model->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$modelUser, $model])) {
            $modelUser->setPassword($modelUser->password);
            $modelUser->generateAuthKey();
            $modelUser->user_type = 3;
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
     * Updates an existing UserCustoms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);
        $modelUser->scenario = 'update';
        $border_start = ArrayHelper::map($this->getBorder($model->off_code), 'id', 'name');
        if (
                $model->load(Yii::$app->request->post()) &&
                $modelUser->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$model, $modelUser])
        ) {
            $modelUser->setPassword($modelUser->password);
            $modelUser->generateAuthKey();
            $modelUser->user_type = 3;
            if ($modelUser->save()) {
                $model->user_id = $modelUser->id;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'modelUser' => $modelUser,
                        'border_start' => $border_start
            ]);
        }
    }

    /**
     * Deletes an existing UserCustoms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserCustoms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserCustoms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UserCustoms::findOne($id)) !== null) {
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

    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

    protected function getBorder($id) {
        $datas = BorderCheckpoint::find()->where(['border_province' => $id])->all();
        return $this->MapData($datas, 'id', 'border_thai');
    }

    public function actionGetBorder() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getBorder($province_id);
                echo Json::encode(['output' => $out, 'เลือกรายการ' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'เลือกรายการ' => '']);
    }

}
