<?php

namespace backend\modules\permitapp\models;

use Yii;

/**
 * This is the model class for table "permit_app_car".
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
 */
class AppCar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permit_app_car';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'dlt_office', 'appearance', 'brands', 'models', 'engine_no'], 'required'],
            [['gender', 'age', 'province', 'country', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'request_chanel', 'created_at', 'updated_at', 'cretaed_by', 'updated_by', 'approve_status', 'approve_by', 'approve_comment', 'dlt_office', 'dlt_br', 'brands', 'seat'], 'integer'],
            [['start_date', 'end_date', 'approve_date'], 'safe'],
            [['weight', 'total_weight'], 'number'],
            [['fullname', 'address', 'appearance'], 'string', 'max' => 128],
            [['passport', 'telephone'], 'string', 'max' => 13],
            [['car_enroll_country', 'models'], 'string', 'max' => 20],
            [['plates_number'], 'string', 'max' => 8],
            [['engine_no'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
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
        ];
    }
}
