<?php use yii\helpers\Html; ?>
<li class="treeview active">
	<?= Html::a('<i class="fa fa-user-secret"></i> <span>Permit Application</span> <i class="fa fa-angle-left pull-right"></i>', ['/#'])  ?>
        <ul class="treeview-menu">
	<?php  
	      if(Yii::$app->user->can('/admin/assignment/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Assignment',['/admin/assignment'])  ?>
	    </li>
	<?php 
	      }
	      if(Yii::$app->user->can('/admin/permission/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Permission',['/admin/permission'])  ?>
	    </li>
	<?php }
	      if(Yii::$app->user->can('/admin/role/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Role',['/admin/role'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/admin/route/index')) {
	?>
            <li>
		<?php // Html::a('<i class="fa fa-angle-double-right"></i> Route',['/rights/route'])  ?>
	    </li>
	<?php }
	?>
        </ul>
</li>
