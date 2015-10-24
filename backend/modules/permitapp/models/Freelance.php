<?php

namespace backend\modules\permitapp\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

/**
 * This is the model class for table "freelance".
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
 * @property integer $operate_by
 */
class Freelance extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    const UPLOAD_FOLDER = 'freelances';

    public static function tableName() {
        return 'freelance';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['gender', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'appearance', 'brands', 'models', 'engine_no'], 'required'],
            [['gender', 'age', 'province', 'country', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'request_chanel', 'created_at', 'updated_at', 'cretaed_by', 'updated_by', 'approve_status', 'approve_by', 'approve_comment', 'dlt_office', 'dlt_br', 'brands', 'seat', 'car_type', 'owner_type', 'operate_by'], 'integer'],
            [['start_date', 'end_date', 'approve_date'], 'safe'],
            [['weight', 'total_weight'], 'number'],
            [['docs'], 'file', 'maxFiles' => 10, 'skipOnEmpty' => true],
            [['fullname', 'address', 'appearance'], 'string', 'max' => 128],
            [['passport', 'telephone', 'carbody_no'], 'string', 'max' => 13],
            [['car_enroll_country', 'models', 'car_color'], 'string', 'max' => 20],
            [['plates_number'], 'string', 'max' => 8],
            [['engine_no'], 'string', 'max' => 11],
            [['ref'], 'string', 'max' => 50],
            [['ref'], 'unique']
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
            'car_type' => 'Car Type',
            'owner_type' => 'ผู้ขออนุญาติ เป็น/ไม่เป็น เจ้าของรถ',
            'car_color' => 'สีรถ',
            'carbody_no' => 'เลขเครื่องยนต์',
            'ref' => 'Ref',
            'docs' => 'Docs',
            'operate_by' => 'ยื่นโดย',
        ];
    }

    public static function getUploadPath() {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl() {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function listDownloadFiles($type) {
        $docs_file = '';
        if (in_array($type, ['docs', 'covenant'])) {
            $data = $type === 'docs' ? $this->docs : $this->covenant;
            $files = Json::decode($data);
            if (is_array($files)) {
                $docs_file = '<ul>';
                foreach ($files as $key => $value) {
                    $docs_file .= '<li>' . Html::a($value, ['/permitapp/freelance/download', 'id' => $this->id, 'file' => $key, 'file_name' => $value]) . '</li>';
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
                        'url' => Url::to(['/permitapp/freelance/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                        'key' => $key
                    ];
                } else {
                    $initial[] = Html::img(self::getUploadUrl() . $this->ref . '/' . $value, ['class' => 'file-preview-image', 'alt' => $model->file_name, 'title' => $model->file_name]);
                }
            }
        }
        return $initial;
    }

    // information 
    public function getBorderPoint() {
        return @$this->hasOne(BorderCheckpoint::className(), ['border_province' => 'province']);
    }

    // information
    public function getCardetail() {
        return 'ลักษณะรถ ' . $this->appearance . ' ยี่ห้อ ' . $this->brands . 'รุ่น ' . $this->models . ' น้ำหนักรถ ' . $this->weight . ' น้ำหนักรวม ' . $this->total_weight .
                ' เลขเครื่องยนต์ ' . $this->engine_no . ' เลขตัวรถ ' . $this->carbody_no . ' สี ' . $this->car_color;
    }

}
