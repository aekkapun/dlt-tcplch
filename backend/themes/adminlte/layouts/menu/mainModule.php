<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;
?>
<aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

        <ul class="sidebar-menu">
            <li>
                <a href="#" class="navbar-link">
                    <i class="fa fa-angle-down"></i> <span class="text-info">Menu</span>
                </a>
            </li>
	<?php if(Yii::$app->user->can('/configuration/default/index')) { ?>
	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span>', ['/configuration/']); ?></li>
	<?php } 
	      if(Yii::$app->user->can('/customs/')) {
	?>
	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['/customs/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/guide/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>Guide Management</span>', ['/guide/default/index']);?></li>
	<?php }
	      if(Yii::$app->user->can('/police/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-users"></i> <span>Police</span>', ['/police/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/customs/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user"></i> <span>Customs</span>', ['/customs/default/index']);  ?></li>
	<?php }
	      if(Yii::$app->user->can('/dlt/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-inr"></i> <span>Department Land of Transport</span>', ['/dlt/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/report/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-bar-chart"></i> <span>Reports Center</span>', ['/report/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/usermanagement/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user"></i> <span>User Management Center</span>', ['/usermanagement/default/index']); ?></li>
	<?php }
	      if(Yii::$app->user->can('/admin/default/index')) {
	?>
	    <li><?= Html::a('<i class="fa fa-user-secret"></i> <span>Admin Rbac</span>', ['/admin/']); ?></li>
	<?php } ?>
        
        </ul>

	<!-- sidebar-menu. -- End -->

    </section>

</aside>
