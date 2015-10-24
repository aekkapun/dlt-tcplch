<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\modules\usermanagement\models\UserDlt;
use backend\modules\usermanagement\models\Usercustoms;
use backend\modules\usermanagement\models\UserTourcompany;

class ProfileController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('view', [
                    'model' => $this->findModel(Yii::$app->user->id),
                    'modelUser' => $this->findModelUser(Yii::$app->user->id),
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate() {
        $model = $this->findModel(Yii::$app->user->id);
        $modelUser = $this->findModelUser(Yii::$app->user->id);
        $model->scenario = 'updateprofile';
        $model->password = $model->password_hash;
        $model->confirm_password = $model->password_hash;
        $oldPass = $model->password_hash;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            if ($oldPass !== $model->password) {
                $model->setPassword($model->password);
            }

            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', 'บันทึกเสร็จเรียบร้อย');
                return $this->redirect(['update']);
            } else {
                throw new NotFoundHttpException('พบข้อผิดพลาด!.');
            }
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'modelUser' => $modelUser,
            ]);
        }
    }

    public function actionUpdatex($id) {
        $model = $this->findModel($id);
        $modelUser = $this->findModelUser($model->user_id);
        $model->scenario = 'updateprofile';
        $model->password = $model->password_hash;
        $model->confirm_password = $model->password_hash;
        $oldPass = $model->password_hash;

        if (
                $model->load(Yii::$app->request->post()) &&
                $modelUser->load(Yii::$app->request->post()) &&
                Model::validateMultiple([$model, $modelUser])
        ) {
            if ($oldPass !== $model->password) {
                $model->setPassword($model->password);
            }

            if ($modelUser->save()) {
                $model->save();
            }
            Yii::$app->getSession()->setFlash('success', 'บันทึกเสร็จเรียบร้อย');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
                        'modelUser' => $modelUser
            ]);
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelUser($id) {
        $model = User::findOne($id);
        if ($model->user_type == 2) {
            return $userModel = UserDlt::findOne($id);
        } elseif ($model->user_type == 3) {
            return $userModel = Usercustoms::findOne($id);
        } elseif ($model->user_type == 5) {
            return $userModel = UserTourcompany::findOne($id);
        }
    }

}
