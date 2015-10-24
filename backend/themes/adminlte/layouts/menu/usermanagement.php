<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-user-secret"></i> <span>การจัดการผู้ใช้งาน</span> <i class="fa fa-angle-left pull-right"></i>', ['/#'])  ?>
        <ul class="treeview-menu">
	<?php  
	      if(Yii::$app->user->can('/configuration/border-checkpoint/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> จนท. กรมการขนส่งทางบก',['/usermanagement/user-dlt/index'])  ?>
	    </li>
	<?php 
	      }
	      if(Yii::$app->user->can('/configuration/border-checkpoint/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> จนท. กรมศุลกากร',['/usermanagement/user-customs/index'])  ?>
	    </li>
	<?php }
	      if(Yii::$app->user->can('/configuration/border-checkpoint/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> บริษัท ธุรกิจการท่องเที่ยว',['/usermanagement/user-tourcompany/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/admin/route/index')) {
	?>
            <li>
		<?php Html::a('<i class="fa fa-angle-double-right"></i> Route',['/rights/route'])  ?>
	    </li>
	<?php }
	?>
        </ul>
</li>
