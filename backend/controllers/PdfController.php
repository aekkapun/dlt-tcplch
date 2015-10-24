<?php

namespace backend\controllers;

use mPDF;
use Yii;

class PdfController extends \yii\web\Controller {

    public function actionIndex() {
        $searchModel = new \backend\modules\usermanagement\models\UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateMpdf() {
        $mpdf =new mPDF('th', 'A4-L', '0', 'THSaraban');
        $searchModel = new \backend\modules\guide\models\TourCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $mpdf->WriteHTML($this->renderPartial('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]));
        $mpdf->Output();
        exit;
    }

    public function actionSamplePdf() {
        $mpdf = new mPDF(); 
        $mpdf->WriteHTML('Sample ทดสอบภาษาไทย');
        $mpdf->Output('D');
        exit;
    }

    public function actionForceDownloadPdf() {
        $mpdf = mPDF('th', 'A4-L', '0', 'thSaraban'); 
        $mpdf->WriteHTML($this->renderPartial('index'));
        $mpdf->Output('MyPDF.pdf', 'D');
        exit;
    }

}
