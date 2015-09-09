<?php
$this->title = 'Police-Dashboard';
$isPolice = '';

if(!Yii::$app->user->isGuest){
     echo $isPolice = Yii::$app->session->get('police_id');
     echo $isPolice;
}
//$stuMaster = app\modules\student\models\StuMaster::find()->where(['stu_master_id' => $isStudent, 'is_status' => 0])->one();
//$stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
?>
<h1>Police Dashborad</h1>