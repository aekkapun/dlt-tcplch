<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\web\Session;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

?>

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
