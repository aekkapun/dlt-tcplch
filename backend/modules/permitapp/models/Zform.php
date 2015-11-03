<?php

namespace backend\modules\permitapp\models;

use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\ArrayHelper;
use backend\modules\configuration\models\BorderCheckpoint;
use DateTime;
use backend\modules\configuration\models\Province;
use backend\modules\configuration\models\Countries;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mdm\autonumber\Behavior;
use yii\db\Expression;

/**
 * This is the model class for table "zform".
 *
 * @property integer $id
 * @property integer $gender
 * @property string $fullname
 * @property integer $age
 * @property string $passport
 * @property string $address
 * @property integer $province
 * @property integer $country
 * @property string $telephone
 * @property string $car_enroll_country
 * @property string $plates_number
 * @property string $start_date
 * @property string $end_date
 * @property integer $start_province
 * @property integer $start_border_point
 * @property integer $target_province
 * @property integer $out_province
 * @property integer $out_border_point
 * @property integer $request_chanel
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $cretaed_by
 * @property integer $updated_by
 * @property integer $approve_status
 * @property integer $approve_by
 * @property string $approve_date
 * @property integer $approve_comment
 * @property integer $dlt_office
 * @property integer $dlt_br
 * @property string $appearance
 * @property integer $brands
 * @property string $models
 * @property double $weight
 * @property double $total_weight
 * @property string $engine_no
 * @property integer $seat
 * @property integer $car_type
 * @property integer $owner_type
 * @property string $car_color
 * @property string $carbody_no
 * @property string $ref
 * @property string $docs
 */
class Zform extends \yii\db\ActiveRecord {

    const UPLOAD_FOLDER = 'docpermit';
    const UPLOAD_FOLDERX = 'driver_file';

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'zform';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'cretaed_by',
                'updatedByAttribute' => 'updated_by'
            ],
//            [
//                'class' => 'mdm\autonumber\Behavior',
//                'attribute' => 'auto_code', // required
//                'group' => $this->id, // optional
//                'value' =>date('Y-m-d') . '.?', // format auto number. '?' will be replaced with generated number
//                'digit' => 4 // optional, default to null. 
//            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        return [
            'create' => ['gender','owner_type','car_type','age','gender', 'operate_by', 'fullname', 'passport', 'address', 'province','telephone', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point','appearance','brands','models','engine_no','carbody_no','car_color'],
            'update' => ['gender', 'car_type', 'operate_by', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'appearance', 'brands', 'models', 'engine_no'],
            'default' => ['gender', 'car_type', 'operate_by', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'appearance', 'brands', 'models', 'engine_no'],
        ];
    }

    public function rules() {
        return [
            [['gender','owner_type', 'car_type', 'operate_by', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'appearance', 'brands', 'models', 'engine_no','carbody_no','car_color'], 'required'],
            [['gender', 'operate_by', 'age', 'province', 'country', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'request_chanel', 'created_at', 'updated_at', 'cretaed_by', 'updated_by', 'approve_status', 'approve_by', 'approve_comment', 'dlt_office', 'dlt_br', 'seat', 'car_type', 'owner_type'], 'integer'],
            [['start_date', 'end_date', 'approve_date'], 'safe'],
            [['auto_code'],'nextValue','format'=>date('Y-m-d').'.?'],
            [['weight', 'total_weight'], 'number'],
            [['docs'], 'file', 'maxFiles' => 10],
            [['fullname', 'address', 'appearance'], 'string', 'max' => 128],
            [['passport', 'telephone', 'carbody_no'], 'string', 'max' => 13],
            [['car_enroll_country', 'models', 'car_color', 'brands'], 'string', 'max' => 20],
            [['plates_number'], 'string', 'max' => 8],
            [['engine_no'], 'string', 'max' => 11],
            [['ref'], 'string', 'max' => 50],
            [['ref'], 'unique'],
            //[['start_date','end_date'], 'date', 'format' => 'php:F d Y'],
            ['end_date', 'validateDates'],
            ['start_date', 'DateDiffStart']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'gender' => 'เพศ',
            'fullname' => 'ชื่อ - นามสกุล',
            'age' => 'อายุ',
            'passport' => 'เลขที่หนังสือหนังสือเดินทาง',
            'address' => 'ที่อยู่',
            'province' => 'จังหวัด',
            'country' => 'ประเทศ',
            'telephone' => 'เบอร์โทร',
            'car_enroll_country' => 'ลงทะเบียนที่ประเทศ',
            'plates_number' => 'หมายเลขทะเบียน',
            'start_date' => 'วันที่เข้าเดินทางเข้าประเทศ',
            'end_date' => 'วันที่เข้าเดินทางออกประเทศ',
            'start_province' => 'ต้นทางที่จังหวัด',
            'start_border_point' => 'ด่านที่เข้า',
            'target_province' => 'ปลายทางที่จังหวัด',
            'out_province' => 'ออกที่จังหวัด',
            'out_border_point' => 'ออกที่ด่านพรมแดน',
            'request_chanel' => 'ช่องทางการทำรายการ online counter',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'cretaed_by' => 'Cretaed By',
            'updated_by' => 'Updated By',
            'approve_status' => 'สถานะการอนุมัติ',
            'approve_by' => 'Approve By',
            'approve_date' => 'Approve Date',
            'approve_comment' => 'ความคิดเห็นเพิ่มเติม',
            'dlt_office' => 'ขนส่งจังหวัด',
            'dlt_br' => 'สาขา',
            'appearance' => 'ลักษณะรถ',
            'brands' => 'ยี่ห้อ',
            'models' => 'แบบรถ',
            'weight' => 'น้ำหนัก',
            'total_weight' => 'น้ำหนักรวม',
            'engine_no' => 'เลขเครื่องยนต์',
            'seat' => 'ที่นั่ง',
            'car_type' => 'ประเภทรถ',
            'owner_type' => 'ผู้ขออนุญาติ',
            'car_color' => 'สีรถ',
            'carbody_no' => 'เลขตัวรถ',
            'ref' => 'Ref',
            'docs' => 'แนบหลักฐาน',
            'operate_by' => 'ผู้ยื่นดำเนินการ',
            'auto_code'=>'รหัสคำขอ',
        ];
    }

    public function getStartBorderPoint() {
        return @$this->hasOne(BorderCheckpoint::className(), ['id' => 'start_border_point']);
    }

    public function getEndBorderPoint() {
        return @$this->hasOne(BorderCheckpoint::className(), ['id' => 'out_border_point']);
    }

    public function getStartProvince() {
        return @$this->hasOne(Province::className(), ['PRV_CODE' => 'start_province']);
    }

    public function getOutProvince() {
        return @$this->hasOne(Province::className(), ['PRV_CODE' => 'out_province']);
    }

    public function getTargetProvince() {
        return @$this->hasOne(Province::className(), ['PRV_CODE' => 'target_province']);
    }

    public function getCountries() {
        return @$this->hasOne(Countries::className(), ['id' => 'country']);
    }

    // information
    public function getCardetail() {
        return 'ลักษณะรถ ' . $this->appearance . ' ยี่ห้อ ' . $this->brands . 'รุ่น ' . $this->models . ' น้ำหนักรถ ' . $this->weight . ' น้ำหนักรวม ' . $this->total_weight .
                ' เลขเครื่องยนต์ ' . $this->engine_no . ' เลขตัวรถ ' . $this->carbody_no . ' สี ' . $this->car_color;
    }

    public static function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl() {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrlx() {
        return Url::base(true) . '/' . self::UPLOAD_FOLDERX . '/';
    }

    public function listDownloadFiles($type) {
        $docs_file = '';
        if (in_array($type, ['docs', 'covenant'])) {
            $data = $type === 'docs' ? $this->docs : $this->covenant;
            $files = Json::decode($data);
            if (is_array($files)) {
                $docs_file = '<ul>';
                foreach ($files as $key => $value) {
                    $docs_file .= '<li>' . Html::a($value, ['/permitapp/zform/download', 'id' => $this->id, 'file' => $key, 'file_name' => $value]) . '</li>';
                }
                $docs_file .='</ul>';
            }
        }

        return $docs_file;
    }

    public function initialPreview($data, $field, $type = 'file') {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        'width' => '120px',
                        'url' => Url::to(['/permitapp/zform/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key' => $key
                    ];
                } else {
                    $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }

    public function initialPreviewx($data, $field, $type = 'file') {
        $initial = [];
        $files = Json::decode($data);
        if (is_array($files)) {
            foreach ($files as $key => $value) {
                if ($type == 'file') {
                    $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                } elseif ($type == 'config') {
                    $initial[] = [
                        'caption' => $value,
                        'width' => '120px',
                        //'url'    => Url::to(['/permitapp/drivers/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
                        'url' => Url::to(['/permitapp/drivers/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key' => $key
                    ];
                } else {
                    $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }

    // function Validate  Checkdate
    public function Ckdate($attr, $param) {

        $curr_date = date('Y-m-d');
        $dos = date('Y-m-d', strtotime($this->$attr));
        //$adm_date = date('Y-m-d', strtotime($this->stu_admission_date));

        if (empty($this->start_date)) {
            return true;
        } else {
            //$diff = $adm_date - $dos;
            $d = date('Y-m-d', $this->$attr) - date('Y-m-d', $curr_date);
            if ($d <= 10) {

                $this->addError($attr, "ต้องดำเนิการล่วงหน้าอย่างน้อย 10 วัน.");
                return false;
            } else
                return true;
        }
    }

    public function CkdateEnd($attr, $param) {

        $curr_date = date('Y-m-d');
        $dos = date('Y-m-d', strtotime($this->$attr));
        //$adm_date = date('Y-m-d', strtotime($this->stu_admission_date));

        if (empty($this->end_date)) {
            return true;
        } else {
            //$diff = $adm_date - $dos;
            $d = date('Y-m-d', $this->$attr) - date('Y-m-d', $curr_date);
            $diff = (strtotime($this->$attr) - strtotime($curr_date)) / ( 60 * 60 * 24 );
            if ($duff <= 10) {

                $this->addError($attr, "ต้องดำเนิการล่วงหน้าอย่างน้อย 10 วัน.");
                return false;
            } else
                return true;
        }
    }

    function DateDiff() {
        $ndate = (strtotime($this->end_date) - strtotime($this->start_date)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
        return $ndate;
    }

    function DateDiffStart() {
        $ndate = (strtotime($this->start_date) - strtotime('now')) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
        if ($ndate < 10) {
            $this->addError($attr, "ต้องดำเนิการล่วงหน้าอย่างน้อย 10 วัน ก่อนเดินทางเข้าประเทศ.");
            return false;
        }
        return true;
    }

    function TimeDiff($strTime1, $strTime2) {
        return (strtotime($strTime2) - strtotime($strTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
    }

    function DateTimeDiff($strDateTime1, $strDateTime2) {
        $curr_date = date('Y-m-d');
        return (strtotime($strDateTime2) - strtotime($strDateTime1)) / ( 60 * 60 ); // 1 Hour =  60*60
    }

    public function getDaysTotal() {
        $discharge_date = strtotime($this->discharge_date);
        $admission_date = strtotime($this->admission_date);
        $datediff = ($discharge_date - $admission_date);
    }

    public function validateDates() {
        $ndate = (strtotime($this->end_date) - strtotime($this->start_date)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24

        if ($ndate <= 0) {
            $this->addError($attr, "วันที่เดินทางออกจากประเทศต้องมากกว่าวันที่เดินทางเข้าประเทศ.");
            return false;
        } elseif ($ndate > 30) {
            $this->addError($attr, "ระยะเวลาในการขออนุญาต ได้ไม่เกิน 30 วัน.");
            return false;
        } else {
            return true;
        }
    }

}
