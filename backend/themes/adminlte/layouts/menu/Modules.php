<?php use yii\helpers\Html; ?>


	    <li><?= Html::a('<i class="fa fa-cogs"></i> <span>Configuration</span>', ['/configuration/']); ?></li>
 

	    <li><?= Html::a('<i class="fa fa-dashboard"></i> <span>Dashboard</span>', ['/dashboard/default/index']); ?></li>



	    <li><?= Html::a('<i class="fa fa-graduation-cap"></i> <span>Course Management</span>', ['/course/default/index']);?></li>



	    <li><?= Html::a('<i class="fa fa-users"></i> <span>Student</span>', ['/student/default/index']);  ?></li>


	    <li><?= Html::a('<i class="fa fa-user"></i> <span>Employee</span>', ['/employee/default/index']);  ?></li>

	    <li><?= Html::a('<i class="fa fa-inr"></i> <span>Fees</span>', ['/fees/default/index']); ?></li>

	    <li><?= Html::a('<i class="fa fa-bar-chart"></i> <span>Reports Center</span>', ['/report/default/index']); ?></li>

	    <li><?= Html::a('<i class="fa fa-user-secret"></i> <span>User Rights</span>', ['/rights/']); ?></li>

