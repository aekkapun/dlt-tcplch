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
use backend\modules\configuration\models\BorderCheckpoint;
use backend\modules\permitapp\models\Drivers;
use backend\modules\permitapp\models\DriversSearch;
use yii\data\ActiveDataProvider;
use mPDF;

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
                    'deletediv' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Zform models.
     * @return mixed
     */
    public function actionPrint($id) {
        $modelsDriver = new ActiveDataProvider([
            'query' => Drivers::find()->where(['appilcant_id' => $id]),
        ]);
        $model = $this->findModel($id);
        return $this->render('print', [
                    'model' => $model,
                    'modelsDriver' => $modelsDriver,
        ]);
    }

    public function actionCreateMpdf($id) {
        $modelsDriver = new ActiveDataProvider([
            'query' => Drivers::find()->where(['appilcant_id' => $id])
        ]);
        $model = $this->findModel($id);
        $mpdf = new mPDF('th', 'A4-L', '0', 'THSaraban');
        $mpdf->SetTitle('ใบอนุญาตชั่วคราว');
        //$mpdf->SetWatermarkImage('http://design.ubuntu.com/wp-content/uploads/ubuntu-logo32.png', 1, '', array(160, 10));
        $mpdf->showWatermarkImage = true;
       // $mpdf->showWatermarkText = true;
       // $mpdf->WriteHTML('<watermarktext content="Department of Land Transport" alpha="0.1" />');
        $mpdf->WriteHTML($this->renderPartial('print', [
                    'model' => $model,
                    'modelsDriver' => $modelsDriver,
        ]));
        $mpdf->Output();
        exit;
    }

    public function actionSamplePdf($id) {
        $mpdf = new mPDF;
        $mpdf->SetTitle('ใบอนุญาตชั่วคราว');
        $mpdf->showWatermarkText = true;
        $mpdf->WriteHTML('<watermarktext content="Department of Land Transport" alpha="0.1" />');
        $mpdf->SetWatermarkImage('http://design.ubuntu.com/wp-content/uploads/ubuntu-logo32.png', 1, '', array(160,10));
        $mpdf->showWatermarkImage = true;
        //$mpdf->WriteHTML('Sample Text');
        $modelsDriver = new ActiveDataProvider([
            'query' => Drivers::find()->where(['appilcant_id' => $id])
        ]);
        $model = $this->findModel($id);
        $mpdf->WriteHTML($this->renderPartial('print', [
                    'model' => $model,
                    'modelsDriver' => $modelsDriver,
        ]));
        $mpdf->Output();
        exit;
    }

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
        return $this->redirect(['drivers/view-app', 'id' =>$id]);
//$modelsDriver = Drivers::find()->where(['appilcant_id' => $id])->all();
//        $modelsDriver = new ActiveDataProvider([
//            'query' => Drivers::find()->where(['appilcant_id' => $id]),
//        ]);
//        $model = $this->findModel($id);
//        return $this->render('view', [
//                    'model' => $model,
//                    'modelsDriver' => $modelsDriver,
//        ]);
    }

    public function actionViewdiv($id) {
        return $this->renderAjax('viewdiv', [
                    'model' => $this->findModelDriver($id),
        ]);
    }

    protected function findModelDriver($id) {
        if (($model = Drivers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Zform model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Zform();
          $model->scenario = 'create';
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model);
            $model->docs = $this->uploadMultipleFile($model);
            $model->dlt_office = $_POST['Zform']['start_province'];

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('alert1', [
                    'type' => 'success',
                    'duration' => 10000,
                    'icon' => 'fa fa-bus',
                    'message' => 'บันทึกข้อมูลเสร็จเรียบร้อย ผู้ขออนุญาต -  ' . $model->fullname,
                    'title' => 'การบันทึกข้อมูล',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['drivers/view-app', 'id' => $model->id]);
            }
        } else {
            Yii::$app->getSession()->setFlash('alert2', [
                'type' => 'danger',
                'duration' => 10000,
                'icon' => 'fa fa-error',
                'message' => 'เกิดข้อผิดพลาด บันทึกข้อมูลwไม่สำเร็จ',
                'title' => 'การบันทึกข้อมูล',
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
        }

        return $this->render('create', [
                    'model' => $model,
                    'border_start' => [],
                    'border_out' => [],
        ]);
    }

    public function actionCreatez() {
        $model = new Drivers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->CreateDirDriver($model->ref);
            $model->docs = $this->uploadMultipleFileDriver($model);
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('alert1', [
                    'type' => 'success',
                    'duration' => 10000,
                    'icon' => 'fa fa-bus',
                    'message' => 'บันทึกข้อมูลเสร็จเรียบร้อย ผู้ขับรถ -  ' . $model->fullname,
                    'title' => 'การบันทึกข้อมูล',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['view', 'id' => $model->appilcant_id]);
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $model->ref = substr(Yii::$app->getSecurity()->generateRandomString(), 10);
            return $this->renderAjax('createz', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Zform model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        $border_start = ArrayHelper::map($this->getBorder($model->start_province), 'id', 'name');
        $border_out = ArrayHelper::map($this->getBorder($model->out_province), 'id', 'name');
//$tempCovenant = $model->covenant;
        $tempDocs = $model->docs;
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDir($model->ref);
            //$model->covenant = $this->uploadSingleFile($model,$tempCovenant);
            $model->docs = $this->uploadMultipleFile($model, $tempDocs);
            $model->dlt_office = $_POST['Zform']['start_province'];
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('info', [
                    'type' => 'info',
                    'duration' => 10000,
                    'icon' => 'fa fa-users',
                    'message' => 'บันทึกข้อมูลเสร็จเรียบร้อย ผู้ยื่นคำขอ - ' . $model->fullname,
                    'title' => 'อัพเดทข้อมูล',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['drivers/view-app', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
                    'model' => $model,
                    'border_start' => $border_start,
                    'border_out' => $border_out,
        ]);
    }

    public function actionUpdatediv($id) {
        $model = $this->findModelDriver($id);

//$tempCovenant = $model->covenant;
        $tempDocs = $model->docs;
        if ($model->load(Yii::$app->request->post())) {

            $this->CreateDirDriver($model->ref);
            //$model->covenant = $this->uploadSingleFile($model,$tempCovenant);
            $model->docs = $this->uploadMultipleFileDriver($model, $tempDocs);

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->appilcant_id]);
            }
        }

        return $this->renderAjax('updatediv', [
                    'model' => $model
        ]);
    }

    /**
     * Deletes an existing Zform model.
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

        return $this->redirect(['index']);
    }

    public function actionDeletediv($id) {
        $model = $this->findModelDriver($id);
//remove upload file & data
        $this->removeUploadDirDriver($model->ref);
// Uploads::deleteAll(['ref'=>$model->ref]);

        $model->delete();

        return $this->redirect(['view']);
        return $this->redirect(['view', 'id' => $model->appilcant_id]);
    }

    public function actionDrivers($id) {
        $model = $this->findModel($id);
        $modelsDriver = new ActiveDataProvider([
            'query' => Drivers::find()->where(['appilcant_id' => $id]),
        ]);
        $model2 = new Drivers();

        if ($model2->load(Yii::$app->request->post())) {
            $model2->appilcant_id = $id;
            return $this->redirect(['drivers', 'id' => $model->id]);
        } else {
            return $this->render('drivers', [
                        'model' => $model2,
                        'modelsApp' => $model,
                        'modelsDriver' => $modelsDriver,
            ]);
        }
    }

    public function actionDetail($app_id) {
        $searchModel = new DriversSearch([
            'appilcant_id' => $app_id  // Tambahkan ini
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('detail', [  // ubah ini
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
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

    protected function findModel2($id) {
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
                $filePath = Zform::getUploadPath() . $ref . '/' . $fileName;
            } else {
                $filePath = Zform::getUploadPath() . $ref . '/thumbnail/' . $fileName;
            }
            @unlink($filePath);
            return true;
        } else {
            return false;
        }
    }

    public function actionDownload($id, $file, $file_name) {
        $model = $this->findModel($id);
        if (!empty($model->ref) && !empty($model->docs)) {
            Yii::$app->response->sendFile($model->getUploadPath() . '/' . $model->ref . '/' . $file, $file_name);
        } else {
            $this->redirect(['/permitapp/freelance/view', 'id' => $id]);
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
        $UploadedFiles = UploadedFile::getInstances($model, 'docs');
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

////////////////////////////

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

//funtion คนขับ

    public function actionDeletefileDriver($id, $field, $fileName) {
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

    private function deleteFileDriver($type = 'file', $ref, $fileName) {
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

    public function actionDownloadDriver($id, $file, $file_name) {
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
    private function uploadSingleFileDriver($model, $tempFile = null) {
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

    private function uploadMultipleFileDriver($model, $tempFile = null) {
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

    private function CreateDirDriver($folderName) {
        if ($folderName != NULL) {
            $basePath = Drivers::getUploadPath();
            if (BaseFileHelper::createDirectory($basePath . $folderName, 0777)) {
                BaseFileHelper::createDirectory($basePath . $folderName . '/thumbnail', 0777);
            }
        }
        return;
    }

    private function removeUploadDirDriver($dir) {
        BaseFileHelper::removeDirectory(Drivers::getUploadPath() . $dir);
    }

}
