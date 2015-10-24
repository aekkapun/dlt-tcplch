<?php
$this->title = 'กรมการขนส่งทางบก';
$isStudent = '';

if(!Yii::$app->user->isGuest){
    // echo $isStudent = Yii::$app->session->get('dlt_id');
    // echo $isStudent;
}
//$stuMaster = app\modules\student\models\StuMaster::find()->where(['stu_master_id' => $isStudent, 'is_status' => 0])->one();
//$stuInfo = app\modules\student\models\StuInfo::findOne($stuMaster->stu_master_stu_info_id);
?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bus"></i> DLT Dashboard</h3>
        </div>
        <div class="box-body">

        </div><!-- /.box-body -->
    </div>