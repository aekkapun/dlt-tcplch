<?php

namespace backend\modules\permitapp\controllers;

use Yii;
use backend\modules\permitapp\models\Zform;
use backend\modules\permitapp\models\ZformSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\permitapp\models\Document;
use backend\modules\permitapp\models\DocumentSearch;
use yii\helpers\BaseFileHelper;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * ZformController implements the CRUD actions for Zform model.
 */
class ZformController extends Controller {

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
     * Lists all Zform models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ZformSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Zform model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Zform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Zform();

        if ($model->load(Yii::$app->request->post())) {
            $this->CreateDir($model->ref);
            $model->doc = $this->uploadMultipleFile($model);
           // $model->dlt_office = $model;
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
        }
        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing Zform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $tempDoc = $model->doc;

        if ($model->load(Yii::$app->request->post())) {
            $model->doc = $this->uploadMultipleFile($model, $tempDoc);
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Zform model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Zform model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Zform the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Zform::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // Upload file folder component function
    private function uploadSingleFile($model, $tempFile = null) {
        $file = [];
        $json = '';
        try {
            $UploadedFile = UploadedFile::getInstance($model, 'covenant');
            if ($UploadedFile !== null) {
                $oldFileName = $UploadedFile->basename . '.' . $UploadedFile->extension;
                $newFileName = md5($UploadedFile->basename . time()) . '.' . $UploadedFile->extension;
                $UploadedFile->saveAs(Zform::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
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
        $UploadedFiles = UploadedFile::getInstances($model, 'doc');
        if ($UploadedFiles !== null) {
            foreach ($UploadedFiles as $file) {
                try {
                    $oldFileName = $file->basename . '.' . $file->extension;
                    $newFileName = md5($file->basename . time()) . '.' . $file->extension;
                    $file->saveAs(Zform::UPLOAD_FOLDER . '/' . $model->ref . '/' . $newFileName);
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
            $basePath = Zform::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    private function removeUploadDir($dir) {
        BaseFileHelper::removeDirectory(Zform::getUploadPath() . $dir);
    }

}
