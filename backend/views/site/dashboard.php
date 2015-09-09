<h1>Administration Dashborad</h1>
<?php
$isCustoms = '';

if(!Yii::$app->user->isGuest){
      $isCustoms = Yii::$app->session->get('dlt_id');
     echo $isCustoms;
}?>