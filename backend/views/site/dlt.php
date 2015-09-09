<?php
$this->title = 'Dlt-Dashboard';
$isStudent = '';

if(!Yii::$app->user->isGuest){
     echo $isStudent = Yii::$app->session->get('dlt_id');
     echo $isStudent;
}
//$stuMaster = app\modules\student\models\StuMaster::find()->where(['stu_master_id' => $isStudent, 'is_status' => 0])->one();
//$stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
?>
<h1>Dlt Dashborad</h1>