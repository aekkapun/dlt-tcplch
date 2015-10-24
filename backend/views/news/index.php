<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SiteNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Site News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('เพิ่มข้อมูลสมาชิก', ['value' => Url::to(['news/create']), 'title' => 'เพิ่มข้อมูลสมาชิก', 'class' => 'btn btn-success', 'id' => 'activity-create-link']); ?>
    </p>

    <?php
    Modal::begin([
        'id' => 'activity-modal',
        'header' => '<h4 class="modal-title">สมาชิก</h4>',
        'size' => 'modal-lg',
        'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">ปิด</a>',
    ]);
    Modal::end();
    ?>
    <?php Pjax::begin(['id' => 'customer_pjax_id']); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsive' => true,
        'hover' => true,
        'floatHeader' => true,
        'pjax' => true,
        'pjaxSettings' => [
            'neverTimeout' => true,
            'enablePushState' => false,
            'options' => ['id' => 'CustomerGrid'],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
            'thump',
            'short',
            'content:ntext',
            // 'views',
            // 'status',
            // 'create_at',
            // 'update_at',
            // 'create_by',
            // 'update_by',
            // 'category_id',
            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '#', [
                                    'class' => 'activity-view-link',
                                    'title' =>$this->title,
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
                    },
                            'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                                    'class' => 'activity-update-link',
                                    'title' => 'แก้ไขข้อมูล',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#activity-modal',
                                    'data-id' => $key,
                                    'data-pjax' => '0',
                        ]);
                    },
                        ]
                    ],
                ],
            ]);
            ?>
            <?php Pjax::end() ?>
        </div>
            <?php $this->registerJs('
        function init_click_handlers(){
            $("#activity-create-link").click(function(e) {
                    $.get(
                        "?r=news/create",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เพิ่มข้อมูลสมาชิก");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=news/view",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เปิดดูข้อมูล");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=news/update",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("อัพเดท");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            
        }
        init_click_handlers(); //first run
        $("#customer_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });'); ?>

<div class="container">
	  <div class="row">
		  <div class="col-sm-12">
			<h1>รวมเว็บฟ้อนภาษาไทย รวบรวมโดย วู๊ดดี้ V 1.0  </h1>
			ขนาดฟ้อนต์ที่ใช้เป็นตัวอย่าง H1 และ  16px
		</div>
			<div class="col-sm-12 woody-font-box Book_Akhanake">
			<h1>ตัวอย่างฟ้อนภาษาไทย book_akhanake-webfont</h1>
			อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ

		</div>

		<div class="col-sm-12 woody-font-box Circular">
			<h1>ตัวอย่างฟ้อนภาษาไทย circular-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ

		</div>

		<div class="col-sm-12 woody-font-box RSU">
			<h1>ตัวอย่างฟ้อนภาษาไทย rsu_regular-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>

		<div class="col-sm-12 woody-font-box Supermarket" >
			<h1>ตัวอย่างฟ้อนภาษาไทย supermarket-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>

		<div class="col-sm-12 woody-font-box iannnnnBKK">
			<h1>ตัวอย่างฟ้อนภาษาไทย 2006_iannnnnbkk-webfont </h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ

		</div>

		<div class="col-sm-12 woody-font-box THBaijam">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_baijam-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>

		<div class="col-sm-12 woody-font-box THChakraPetch">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_chakra_petch-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THCharmofAU">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_charm_of_au-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THCharmonman">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_charmonman-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THFahkwang">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_fahkwang-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THK2DJuly8">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_k2d_july8-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THKoHo">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_koho-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THKrub">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_krub-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THMaliGrade6">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_mali_grade6-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THNiramitAS">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_niramit_as-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 THSarabunNew">
            <h1 class="THSarabunNew">ตัวอย่างฟ้อนภาษาไทย thsarabunnew-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>
		<div class="col-sm-12 woody-font-box THSrisakdi">
			<h1>ตัวอย่างฟ้อนภาษาไทย th_srisakdi-webfont</h1>
						อยู่ ให้มีศักดิ์ศรี ดี ให้มีคุณค่า บ้า ให้มีเหตุผล ทน ให้มีเป้าหมาย และตาย ให้มีคนจำ
		</div>


	</div>
</div>