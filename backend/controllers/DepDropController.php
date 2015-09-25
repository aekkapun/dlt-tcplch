<?php

namespace backend\controllers;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\configuration\models\Province;
use backend\modules\configuration\models\BorderCheckpoint;

class DepDropController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    // dropdown option ในการเลือกข้อมูลแล้วนำมา Map ข้อมูลแล้วคืนค่าไปที่ Depdrop 
    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

    protected function getAmphur($id) {
        $datas = Amphur::find()->where(['PRV_CODE' => $id])->all();
        return $this->MapData($datas, 'AMP_CODE', 'AMP_DESC');
    }

    public function actionGetAmphur() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getAmphur($province_id);
                echo Json::encode(['output' => $out, 'เลือกรายการ' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'เลือกรายการ' => '']);
    }

    // dropdown option ในการเลือกข้อหาตาม หมวดหมู่  
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
