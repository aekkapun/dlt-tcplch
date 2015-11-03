<?php

namespace backend\modules\permitapp\controllers;

use Yii;
use backend\modules\permitapp\models\Zform;
use backend\modules\permitapp\models\ZformSearch;
use backend\modules\permitapp\models\Drivers;
use backend\modules\permitapp\models\DriversSearch;
use yii\data\ActiveDataProvider;
//use app\models\Uploads;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\helpers\html;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * FreelanceController implements the CRUD actions for Freelance model.
 */
class DriversController extends Controller {

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
     * Lists all Freelance models.
     * @return mixed
     */
    public function actionViewApp($id) {
//$modelsDriver = Drivers::find()->where(['appilcant_id' => $id])->all();
        $modelsDriver = new ActiveDataProvider([
            'query' => Drivers::find()->where(['appilcant_id' => $id]),
        ]);
        $model = Zform::findOne(['id' => $id]);
        return $this->render('view-app', [
                    'model' => $model,
                    'modelsDriver' => $modelsDriver,
        ]);
    }

    public function actionIndex() {
        $searchModel = new DriversSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexAjax() {
        $searchModel = new DriversSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index-ajax', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Freelance model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionViewAjax($id) {
        return $this->renderAjax('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Freelance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Drivers();

        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model);
            $model->docs = $this->uploadMultipleFile($model);

            if ($model->save()) {
                 return $this->redirect(['view', 'id' => $model->id]);
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }
        public function actionCreate_1() {
        $model = new Drivers();

        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model);
            $model->docs = $this->uploadMultipleFile($model);

            if ($model->save()) {
                return $this->redirect(['view-app', 'id' => $model->appilcant_id]);
                return print_r($model);
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    public function actionCreateAjax() {
//        $model = new Drivers();
//
//        if ($model->load(Yii::$app->request->post())) {
//
//            $this->CreateDir($model->ref);
//            //$model->covenant = $this->uploadSingleFile($model);
//            $model->docs = $this->uploadMultipleFile($model);
//
//            if ($model->save()) {
//                return $this->redirect(['view-app', 'id' => $model->appilcant_id]);
//                return print_r($model);
//            }
//        } else {
//            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
//        }
//
//        return $this->renderAjax('create2', [
//                    'model' => $model,
//        ]);
        
                $model = new Drivers();

        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model);
            $model->docs = $this->uploadMultipleFile($model);

            if ($model->save()) {
                 return $this->redirect(['view-app', 'id' => $model->appilcant_id]);
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
        }

        return $this->renderAjax('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Freelance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        //$tempCovenant = $model->covenant;
        $tempDocs = $model->docs;
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model,$tempCovenant);
            $model->docs = $this->uploadMultipleFile($model, $tempDocs);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
                    'model' => $model
        ]);
    }

    public function actionUpdateAjax($id) {
        $model = $this->findModel($id);

        //$tempCovenant = $model->covenant;
        $tempDocs = $model->docs;
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model,$tempCovenant);
            $model->docs = $this->uploadMultipleFile($model, $tempDocs);

            if ($model->save()) {
                return $this->redirect(['view-app', 'id' => $model->appilcant_id]);
            }
        }

        return $this->renderAjax('update', [
                    'model' => $model
        ]);
    }

    /**
     * Deletes an existing Freelance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        //remove upload file & data
        $this->removeUploadDir($model->ref);
        // Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();
        return $this->redirect(['view-app', 'id' => $model->appilcant_id]);
        // return $this->redirect(['index']);
    }

    public function actionDeleteApp($id) {
        $model = $this->findModel($id);
        //remove upload file & data
        $this->removeUploadDir($model->ref);
        // Uploads::deleteAll(['ref'=>$model->ref]);
        $model->delete();
        return $this->redirect(['view-app', 'id' => $model->appilcant_id]);
    }

    /**
     * Finds the Freelance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Freelance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Drivers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDeletefile($id, $field, $fileName) {
        $status = ['success' => false];
        if (in_array($field, ['docs', 'covenant'])) {
            $model = $this->findModel($id);
            $files = Json::decode($model->{$field});
            if (array_key_exists($fileName, $files)) {
                if ($this->deleteFile('file', $model->ref, $fileName)) {
                    $status = ['success' => true];
                    unset($files[$fileName]);
                    $model->{$field} = Json::encode($files);
                    $model->save();
                }
            }
        }
        echo json_encode($status);
    }

    private function deleteFile($type = 'file', $ref, $fileName) {
        if (in_array($type, ['file', 'thumbnail'])) {
            if ($type === 'file') {
                $filePath = Drivers::getUploadPath() . $ref . '/' . $fileName;
            } else {
                $filePath = Drivers::getUploadPath() . $ref . '/thumbnail/' . $fileName;
            }
            @unlink($filePath);
            return true;
        } else {
            return false;
        }
    }

    public function actionDownload($id, $file, $file_name) {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->covenant)) {
            Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $file_name);
        } else {
            $this->redirect(['/permitapp/drivers/view', 'id' => $id]);
        }
    }

    /**
     * Upload & Rename file
     * @return mixed
     */
    private function uploadSingleFile($model, $tempFile = null) {
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, 'covenant');
            if ($UploadedFile !== null) {
                $oldFileName = $UploadedFile->basename . '.' . $UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename . time()) . '.' . $UploadedFile->extension;
                $UploadedFile->saveAs(Drivers::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
                $file[$newFileName] = $oldFileName;
                $json = Json::encode($file);
            } else {
                $json = $tempFile;
            }
        } catch (Exception $e) {
            $json = $tempFile;
        }
        return $json;
    }

    private function uploadMultipleFile($model, $tempFile = null) {
        $files = [];
        $json = '';
        $tempFile = Json::decode($tempFile);
        $UploadedFiles = UploadedFile::getInstances($model, 'docs');
        if ($UploadedFiles !== null) {
            foreach ($UploadedFiles as $file) {
                try {
                    $oldFileName = $file->basename . '.' . $file->extension;
                    $newFileName = md5($file->basename . time()) . '.' . $file->extension;
                    $file->saveAs(Drivers::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
                    $files[$newFileName] = $oldFileName;
                } catch (Exception $e) {
                    
                }
            }
            $json = json::encode(ArrayHelper::merge($tempFile, $files));
        } else {
            $json = $tempFile;
        }
        return $json;
    }

    private function CreateDir($folderName) {
        if ($folderName != NULL) {
            $basePath = Drivers::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir) {
        BaseFileHelper::removeDirectory(Drivers::getUploadPath() . $dir);
    }

}
