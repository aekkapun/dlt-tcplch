<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\helpers\Json;
use kartik\widgets\FileInput;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\permitapp\models\DriversSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลคนขับรถ';
$this->params['breadcrumbs'][] = $this->title;


/* * ********************************************************
 * 
 *  Javascript event handlers
 * 
 * ********************************************************* */


//This handles the clicking of the refresh button on the grid
$this->registerJs(
        "$(document).on('click', \"#refresh_ingredients_grid\", function() 
    	{
    	$.pjax.reload({container:\"#order_ingredient_grid\"});
		});"
);



//This handles the change of customer details
$this->registerJs("$('#customerorders-customer_id').on('change',function(){
	updateOrderDetails();
});");

//Action on adding an ingredient  data: {id: ".$model->id."},
$this->registerJs(
        "$(document).on('click', '#add_ingredient_button', function() 
    	{
    	
		$.ajax
  		({
  		url: '" . yii\helpers\Url::toRoute("/permitapp/drivers/create") . "',

		success: function (data, textStatus, jqXHR) 
			{
			$('#activity-modal').modal();
			$('.modal-body').html(data);
			},
        error: function (jqXHR, textStatus, errorThrown) 
        	{
            console.log('An error occured!');
            alert('Error in ajax request' );
        	}
		});
	});"
);


//action on clicking the ingredient percentage amount link in the grid  data: {id: ".$model->id."},
$this->registerJs(
        "$(document).on('click', \".sap_edit_ingredient_link\", function() 
    	{
    	var ingredientID = ($(this).attr('ingredientId'));
		$.ajax
  		({
  		url: '" . yii\helpers\Url::toRoute("customer-order/ajax-update-ingredient") . "',
		data: {id: ingredientID},
		success: function (data, textStatus, jqXHR) 
			{
			$('#activity-modal').modal();
			$('.modal-body').html(data);
			},
        error: function (jqXHR, textStatus, errorThrown) 
        	{
            console.log('An error occured!');
            alert('Error in ajax request' );
        	}
		});
		
		
	});"
);




//action on submiting the ingredient add form
$this->registerJs("
$('body').on('beforeSubmit', 'form#ingredient_add', function () {
     var form = $(this);
     // return false if form still have some validation errors
     if (form.find('.has-error').length) {
          return false;
     }
     // submit form
     $.ajax({
          url: form.attr('action'),
          type: 'post',
          data: form.serialize(),
          success: function (response) 
          		{
          		$('#activity-modal').modal('hide');
          		
          		$.pjax.reload({container:'#order_ingredient_grid'});
				}
		  });	
     return false;
});
");



//action of deleting an ingredient
$this->registerJs(
        "$(document).on('click', '.order_ingredient_delete', function()  
    {
  	$.ajax
  		({
  		url: '" . yii\helpers\Url::toRoute("customer-orders-ingredients/ajax-delete") . "',
		data: {id: $(this).closest('tr').data('key')},
		success: function (data, textStatus, jqXHR) 
			{
			var url = '" . yii\helpers\Url::toRoute("customer-order/update") . "&id=" . $model->id . "';
          	$.pjax.reload({url: url, container:'#order_ingredient_grid'});
			},
        error: function (jqXHR, textStatus, errorThrown) 
        	{
            console.log('An error occured!');
            alert('Error in ajax request' );
        	}
		});
   	});"
);
?>
<div class="drivers-index">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-bars"></i> <?php // $this->title              ?></h3>
            <p class="pull-right">
                <?= Html::button('ข้อมูลคนขับรถ', ['value' => Url::to('index.php?r=permitapp/drivers/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>

            </p>
        </div>
        <div class="box-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>


            <?php
            Modal::begin([
                'header' => '<h4>Branches</h4>',
                'id' => 'modal',
                'size' => 'modal-lg',
            ]);

            echo "<div id='modalContent'></div>";

            Modal::end();
            ?>
            <?php Pjax::begin(['id' => 'branchesGrid']); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    [
                        'attribute' => 'drivers_title',
                        'format' => 'html',
                        'value' => function($data) {
                            switch ($data->drivers_title) {
                                case 1: return 'นาย';
                                case 2: return 'นาง';
                                case 3: return 'นางสาว';
                            }
                        },
                    ],
                    'drivers_name',
                    'drivers_lastname',
                    'drivers_passport',
                    'drivers_licence',
                    // 'appilcant_id',
                    // 'car_id',
                    //'status',
                    [
                        'label' => 'Active',
                        'attribute' => 'status',
                        'format' => 'html',
                        'value' => function($model) {
                            return Html::a(
                                            ($model->status == 0 ? '<i class="glyphicon glyphicon-remove"></i> Not Active' : '<i class="glyphicon glyphicon-ok"></i> Active'), '#', ['class' => 'btn btn-block btn-sm' . ($model->status == 0 ? ' btn-default' : ' btn-success')]);
                        }
                            ],
                            // 'drivers_licence',
                            // 'appilcant_id',
                            // 'car_id',
                            // 'status',
                            // 'blacklist_status',
                            // 'blacklist_date',
                            // 'comment',
                            // 'create_at',
                            // 'create_by',
                            // 'update_at',
                            // 'update_by',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'buttonOptions' => ['class' => 'btn btn-default'],
                                'template' => '<div class="btn-group btn-group-sm text-center" role="group">{copy} {view} {update} {delete} </div>',
                                'options' => ['style' => 'width:150px;'],
                            ],
                        ],
                    ]);
                    ?>
                    <?php Pjax::end(); ?>
                </div><!-- /.box-body -->
            </div>

        </div>
        <div>
            <?php
            Modal::begin([
                'id' => 'activity-modal',
                // 'header' => '<h4 class="modal-title">Add Product</h4>',
                'size' => 'modal-lg',
                'options' =>
                [
                    'tabindex' => false,
                ]
            ]);
            ?>


            <div id="modal_content">dd</div>

            <?php Modal::end(); ?>

</div>
