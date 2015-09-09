<?php
$isCustoms = '';

if(!Yii::$app->user->isGuest){
      $isCustoms = Yii::$app->session->get('customs_id');
     echo $isCustoms;
}
//$stuMaster = app\modules\student\models\StuMaster::find()->where(['stu_master_id' => $isStudent, 'is_status' => 0])->one();
//$stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
?>
<h>Customs Dashborad</h>