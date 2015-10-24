<?php

namespace backend\controllers;

use Yii;
Use yii\web\Session;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\models\Userdlt;
use backend\models\Usercustoms;
use app\models\User;
use backend\models\Userpolice;
use backend\models\LoginDetails;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionFont(){
        return $this->render('font');
    }

    public function actionIndex() {

        $this->layout = 'homePage';
        if (\Yii::$app->user->isGuest)
            return $this->redirect(['site/login']);
        else {
            $isDlt = Yii::$app->session->get('dlt_id');
            $isCustoms = Yii::$app->session->get('customs_id');
            $isPolice = Yii::$app->session->get('police_id');
            //$holidayData = \app\models\NationalHolidays::find()->andWhere(['is_status'=>0])->asArray()->all();
            if (isset($isDlt)) {
                //$payFees = Yii::$app->db->createCommand("SELECT SUM(fees_pay_tran_amount) FROM fees_payment_transaction WHERE fees_pay_tran_stu_id=" . Yii::$app->session->get('stu_id') . " AND is_status=0")->queryScalar();
                //$currentFeesData = \app\modules\fees\models\FeesPaymentTransaction::getUnpaidTotal($isStudent);
                return $this->render('dlt', [
                                //'holidayData' => $holidayData,
                                //'currentFeesData' => $currentFeesData,
                                //'payFees' => $payFees
                ]);
            } else if (isset($isCustoms)) {
                return $this->render('customs', [
                                //'holidayData' => $holidayData
                ]);
            } elseif (isset($isPolice)) {
                return $this->render('police');
            } else
                return $this->render('admin');
        }
    }

    public function actionLogin() {

        $model = new LoginForm();
        $login = new LoginDetails;
        if ($model->load(Yii::$app->request->post())) {
            $log = User::find()->where(['username' => $_POST['LoginForm']['username'], 'is_block' => 0])->one();
            if (empty($log)) {
                \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> Incorrect username or password. !</b>');
                return $this->render('login', ['model' => $model]);
            }

            $login->login_user_id = $log['id'];
            $loginuser = $login->login_user_id;


            $dltlogin = Userdlt::find()->andWhere(['user_id' => $loginuser])->one();
            $customslogin = Usercustoms::find()->andWhere(['user_id' => $loginuser])->one();
            $policelogin = Userpolice::find()->andWhere(['user_id'=>$loginuser])->one();
            if ($dltlogin) {
                \Yii::$app->session->set('dlt_id', $dltlogin->id);
            } else if ($customslogin) {
                \Yii::$app->session->set('customs_id', $customslogin->id);
            }else if ($policelogin) {
                \Yii::$app->session->set('police_id', $policelogin->id);
            } else if (!$customslogin && !$dltlogin && !$policelogin) {
                \Yii::$app->session->set('admin_user', $loginuser);
            } else {
                \Yii::$app->session->setFlash('loginError', '<i class="fa fa-warning"></i><b> These Login credentials are Blocked/Deactive by Admin</b>');
                return $this->render('login', ['model' => $model,]);
            }

            $login->login_status = 1;
            $login->login_at = new \yii\db\Expression('NOW()');
            $login->user_ip_address = $_SERVER['REMOTE_ADDR'];
            $login->save(false);

            if ($model->login())
                return $this->goBack();
            else
                return $this->render('login', ['model' => $model,]);
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

//    public function actionLogout() {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }

    public function actionLogout() {
        if (isset(Yii::$app->user->id))
            LoginDetails::updateAll(['login_status' => 0, 'logout_at' => new \yii\db\Expression('NOW()')], 'login_user_id=' . Yii::$app->user->id . ' AND login_status = 1');

        Yii::$app->user->logout();
        return $this->goHome();
    }

}
