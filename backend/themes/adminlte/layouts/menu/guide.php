<?php use yii\helpers\Html; ?>

<li class="treeview active">
	<?= Html::a('<i class="fa fa-inr"></i> <span>ข้อมูลบริษัทนำเที่ยว/มัคคุเทศก์</span> <i class="fa fa-angle-left pull-right"></i>', ['/guide/default/index'])  ?>
        <ul class="treeview-menu">
	<?php if(Yii::$app->user->can('/guide/default/index')) { ?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> รายชื่อบริษัทนำเที่ยว',['/guide/tour-company/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/fees/fees-collect-category/index')) {
	?>
            <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Fees Category',['/fees/fees-collect-category/index'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/fees/fees-payment-transaction/collect')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Fees Collect',['/fees/fees-payment-transaction/collect'])  ?>
	    </li>
	<?php } 
	      if(Yii::$app->user->can('/fees/fees-payment-transaction/stu-fees-data') && Yii::$app->session->get('stu_id')) {
	?>
	    <li>
		<?= Html::a('<i class="fa fa-angle-double-right"></i> Fees Collection',['/fees/fees-payment-transaction/stu-fees-data'])  ?>
	    </li>
	<?php } ?>
        </ul>
</li>
