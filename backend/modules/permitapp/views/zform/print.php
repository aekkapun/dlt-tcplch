
<style type="text/css">
    * {
        margin:0;
        padding:0;
        font-family:Arial, "times New Roman", tahoma;
        font-size:12px;
    }
    html {
        font-family:Arial, "times New Roman", tahoma;
        font-size:12px;
        color:#000000;
    }
    body {
        font-family:Arial, "times New Roman", tahoma;
        font-size:12px;
        padding:0;
        margin:0;
        color:#000000;
    }
    .boxx{
        border-radius: 2px;
        border: 4px dotted #0000;
        padding: 20px;
        width: auto;
        height: 100px;

    }
    .divbox{
        font-size:2.5em; 
        padding: 0 px;
        margin: 0 px;
    }
    .divboxu{
        text-align:center;
        border: 4px dotted #0000;
        border-top-style: none;
        border-left-style:none;
        border-right-style: none;
        border-bottom-style: dotted;
        font-size:2.5em; 
        padding: 0 px;
        margin: 0 px; 
    }
    p.ex1{
        font-size:3em; padding: 0 px;margin: 0 px;
    }
    p.ex2 {
        font-size:3em; padding: 0 px;margin: 0 px;
        text-align:center;
        border-bottom-style: dashed;
    }
    .headTitle {
        font-size:12px;
        font-weight:bold;
        text-transform:uppercase;
    }
    .headerTitle01 {
        border:1px solid #333333;
        border-left:2px solid #000;
        border-bottom-width:2px;
        border-top-width:2px;
        font-size:11px;
    }
    .headerTitle01_r {
        border:1px solid #333333;
        border-left:2px solid #000;
        border-right:2px solid #000;
        border-bottom-width:2px;
        border-top-width:2px;
        font-size:11px;
    }
    /* สำหรับช่องกรอกข้อมูล  */
    .box_data1 {
        font-family:Arial, "times New Roman", tahoma;
        height:18px;
        //border:0px dotted #333333;
        // border-bottom-width:1px;
    }
    /* กำหนดเส้นบรรทัดซ้าย  และด้านล่าง */
    .left_bottom {
        border-left:2px solid #000;
        border-bottom:1px solid #000;
    }
    /* กำหนดเส้นบรรทัดซ้าย ขวา และด้านล่าง */
    .left_right_bottom {
        border-left:2px solid #000;
        border-bottom:1px solid #000;
        border-right:2px solid #000;
    }
    /* สร้างช่องสี่เหลี่ยมสำหรับเช็คเลือก */
    .chk_box {
        display:block;
        width:10px;
        height:10px;
        overflow:hidden;
        border:1px solid #000;
    }
    /* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
    @media all
    {
        .page-break	{ display:none; }
        .page-break-no{ display:none; }
    }
    @media print
    {
        .page-break	{ display:block;height:1px; page-break-before:always; }
        .page-break-no{ display:block;height:1px; page-break-after:avoid; }	
    }

</style>
<?php

use yii\helpers\Html;
?>
<div class="box box-primary site-news-index THSarabunNew container">
    <watermarkimage src="<?= \yii\helpers\Url::to('@web/images/logow.png', true) ?>" alpha="0.4" size="250,250" position="P" />
    <p style="font-size:8em; text-align: center;padding: 0 px;margin: 0px">อนุญาตชั่วคราว</p>
    <p style="font-size:4.5em; text-align: center;padding: 0 px;margin: 0px">วันที่  <?= Yii::$app->formatter->asDate($model->start_date, 'medium'); ?> - <?= Yii::$app->formatter->asDate($model->end_date, 'medium'); ?></p>
    <p style="font-size:4.5em; text-align: center;padding: 0 px;margin: 0px">รถประเทศ <?= $model->car_enroll_country ?> </p>
    <p style="font-size:12 em; text-align: center;padding: 0 px;margin: 0px"><u><?= $model->plates_number ?></u> </p>

<div style="padding:0 px; margin-left: 5px ;margin: 0px" class="boxx">      
    <?php
    $array = $modelsDriver->models;
    $table = "<table style='width:100%'><tbody><tr>";
    //^^^^ See here the start of the first row
    foreach ($array as $a => $v) {
        $i = $a + 1;
        $table .= "<td style='font-size:3em;'>$i.) $v->drivers_name  $v->drivers_lastname</td>";
        //^           ^ double quotes for the variables
        if (($a + 1) % 3 == 0)
            $table .= "</tr><tr>";
    }
    $table .= "</tr></tbody></table>";
    //^   ^^^^^ end the row
    //| append the text and don't overwrite it at the end
    echo $table;
    ?>

</div> 
<p style="page-break-before: always"></p>
<p style="font-size:4em;padding: 0px; margin: 0px; text-align: center">รายละเอียดรถยนต์</p>
<table width="100%" border="0">
    <tr>
        <td width="14%"><span style="font-size:3em;padding: 0px; margin: 0px;">ลักษณะ</span></td>
        <td colspan="3" nowrap="nowrap" style="border-bottom-style: dotted;"> <p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->appearance ?></p></td>
        <td width="8%"><span style="font-size:3em;padding: 0px; margin: 0px;">ยี่ห้อ</span></td>
        <td width="25%" nowrap="nowrap" style="border-bottom-style: dotted;"> <p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->brands ?></p></td>
        <td width="8%"><span style="font-size:3em;padding: 0px; margin: 0px;">แบบ</span></td>
        <td width="15%" style="border-bottom-style: dotted;"> <p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->models ?></p></td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="28"><span style="font-size:3em;padding: 0px; margin: 0px;">สี</span></td>
        <td colspan="3" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->car_color ?></p></td>
        <td width="207"><span style="font-size:3em;padding: 0px; margin: 0px;">น้ำหนักรถ</span></td>
        <td colspan="3" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->weight ?></p></td>
        <td width="229"><span style="font-size:3em;padding: 0px; margin: 0px;">น้ำหนักรวม</span></td>
        <td width="116" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->total_weight ?></p></td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="14%"><span style="font-size:3em;padding: 0px; margin: 0px;">เลขตัวรถ</span></td>
        <td width="200px" colspan="3" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->carbody_no ?></p></td>
        <td width="200px"><span style="font-size:3em;padding: 0px; margin: 0px;">เลขเครื่องยนต์</span></td>
        <td width="25%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->engine_no ?></p></td>
        <td width="8%"><span style="font-size:3em;padding: 0px; margin: 0px;">ที่นั่ง</span></td>
        <td width="15%" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->seat ?></p></td>
    </tr>
</table>
<p style="font-size:4em;padding: 0px; margin: 0px; text-align: center">รายละเอียดการเดินทาง</p>
<table width="100%" border="0">
    <tr>
        <td width="39%"><span style="font-size:3em;padding: 0px; margin: 0px;">เดินทางเข้าประเทศวันที่</span></td>
        <td width="38%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= Yii::$app->formatter->asDate($model->start_date, 'medium'); ?></p></td>
        <td width="8%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center">&nbsp;</p></td>
        <td width="15%" style="border-bottom-style: dotted;">&nbsp;</td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="155"><span style="font-size:3em;padding: 0px; margin: 0px;">ต้นทางที่จังหวัด</span></td>
        <td colspan="150" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->startProvince->PRV_DESC ?></p></td>
        <td width="200"><span style="font-size:3em;padding: 0px; margin: 0px;">ณ ด่านพรมแดน</span></td>
        <td width="300" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->startBorderPoint->border_thai ?></p> </td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="30%"><span style="font-size:3em;padding: 0px; margin: 0px;">ปลายทางที่จังหวัด</span></td>
        <td width="47%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->targetProvince->PRV_DESC ?></p></td>
        <td width="8%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center">&nbsp;</p></td>/td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="30%"><span style="font-size:3em;padding: 0px; margin: 0px;">ออกจากประเทศวันที่</span></td>
        <td width="47%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= Yii::$app->formatter->asDate($model->end_date, 'medium'); ?></p></td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="150 px"><span style="font-size:3em;padding: 0px; margin: 0px;">ออกที่จังหวัด</span></td>
        <td width="150 px"  style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->startProvince->PRV_DESC ?></p></td>
        <td width="200"><span style="font-size:3em;padding: 0px; margin: 0px;">ณ ด่านพรมแดน</span></td>
        <td width="300" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center"><?= $model->endBorderPoint->border_thai ?></p> </td>
    </tr>
</table>
<table width="100%" border="0">
    <tr>
        <td width="30%"><span style="font-size:3em;padding: 0px; margin: 0px;">เส้นทางจังหวัด/ท้องที่เดินทาง</span></td>
        <td width="47%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center">&nbsp;</p></td>
        <td width="8%" nowrap="nowrap" style="border-bottom-style: dotted;"><p style="font-size:3em;padding: 0px; margin: 0px; text-align:center">&nbsp;</p></td>
    </tr>
</table>
