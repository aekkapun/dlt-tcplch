<?php
use yii\helpers\Html;
use backend\modules\configuration\models\Customs;
use backend\modules\configuration\models\Province;
use backend\controllers\NewsCategoryController;
use backend\modules\configuration\models\Customsoffice;
use backend\modules\configuration\models\BorderCheckpoint;


$this->title = 'Master Configuration';

$this->params['breadcrumbs'][] = ['label' => 'Configuration', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuration-default-index">

    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="glyphicon glyphicon-cog"></i> Master Configuration</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-flag"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('ด่านศุลกากร', ['/configuration/customs/index']); ?></span>
                            <span class="edusec-link-box-number"><?= Customs::find()->count(); ?></span>
                            <span class="edusec-link-box-desc">ข้อมูลด่านศุลกากร</span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/configuration/customs/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="glyphicon glyphicon-list-alt"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('จังหวัด', ['/configuration/province']); ?></span>
                            <span class="edusec-link-box-number"><?= Province::find()->count(); ?></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/state/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-building-o"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('City/Town', ['/city']); ?></span>
                            <span class="edusec-link-box-number"></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/city/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>

                <!---Start Second Row Display Configuration--->
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-university"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('สำนัก/ด่านศุลกากร', ['/configuration/customs-office/index']); ?></span>
                            <span class="edusec-link-box-number"><?= Customsoffice::find()->count(); ?></span>
                            <span class="edusec-link-box-desc">สำนัก/ด่านศุลกากร</span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/configuration/customs-office/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-language"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('Languages', ['/languages']); ?></span>
                            <span class="edusec-link-box-number"></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/languages/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>


                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-calendar-o"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('National Holidays', ['/national-holidays']); ?></span>
                            <span class="edusec-link-box-number"></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/national-holidays/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-files-o floatRight"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('Document Categories', ['/document-category']); ?></span>
                            <span class="edusec-link-box-number">20<?php // app\models\Country::find()->where(['is_status'=>0])->count();  ?></span>
                            <span class="edusec-link-box-desc">Use Student/Employee Modules</span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/document-category/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>


                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="edusec-link-box">
                        <span class="edusec-link-box-icon bg-light-blue-active"><i class="fa fa-flag-checkered"></i></span>
                        <div class="edusec-link-box-content">
                            <span class="edusec-link-box-text"><?= Html::a('Nationality', ['/nationality']); ?></span>
                            <span class="edusec-link-box-number"></span>
                            <span class="edusec-link-box-desc"></span>
                            <span class="edusec-link-box-bottom"><?= Html::a('<i class="fa fa-plus-square"></i> Create New', ['/nationality/create']); ?></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>


            </div> <!-- /. End Row-->


        </div><!-- /.box-body -->
    </div>




</div>
