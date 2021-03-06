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
class AppCar extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'permit_app_car';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['car_type', 'carbody_no', 'owner_type', 'gender', 'car_color', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'dlt_office', 'appearance', 'brands', 'models', 'engine_no'], 'required'],
            [['gender', 'owner_type', 'car_type', 'age', 'car_color', 'province', 'country', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'request_chanel', 'created_at', 'updated_at', 'cretaed_by', 'updated_by', 'approve_status', 'approve_by', 'approve_comment', 'dlt_office', 'dlt_br', 'brands', 'seat'], 'integer'],
            [['start_date', 'end_date', 'approve_date'], 'safe'],
            [['weight', 'total_weight'], 'number'],
            [['fullname', 'address', 'appearance'], 'string', 'max' => 128],
            [['passport', 'telephone'], 'string', 'max' => 13],
            [['car_enroll_country', 'models'], 'string', 'max' => 20],
            [['plates_number'], 'string', 'max' => 8],
            [['engine_no', 'carbody_no'], 'string', 'max' => 13]
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
            'carbody_no' => 'เลขตัวรถ',
            'seat' => 'ที่นั่ง',
            'car_type' => 'Car Type',
            'owner_type' => 'ผู้ขออนุญาติ เป็น/ไม่เป็น เจ้าของรถ',
            'car_color' => 'สีรถ'
        ];
    }

    public static function itemAlias($type, $code = NULL) {
        $_items = array(
            'sex' => array(
                '1' => 'ชาย',
                '2' => 'หญิง',
            ),
            'prefixs' => array(
                '1' => 'นาย',
                '2' => 'นาง',
                '3' => 'นางสาว',
            ),
            'marital' => array(
                '1' => 'โสด',
                '2' => 'สมรส',
                '3' => 'อย่างร้าง',
                '4' => 'แยกกันอยู่',
                '5' => 'หมา้ย',
            ),
            'skill' => [
                'Objective C' => 'Objective C',
                'Python' => 'Python',
                'Java' => 'Java',
                'JavaScript' => 'JavaScript',
                'PHP' => 'PHP',
                'SQL' => 'SQL',
                'Ruby' => 'Ruby',
                'FoxPro' => 'FoxPro',
                'C++' => 'C++',
                'C' => 'C',
                'ASP' => 'ASP',
                'Assembly' => 'Assembly',
                'Visual Basic' => 'Visual Basic'
            ],
            'social' => [
                'facebook' => 'Facebook',
                'twiter' => 'Twiter',
                'google+' => 'Google+',
                'tumblr' => 'Tumblr'
            ],
            'cartype' => [
                '1' => 'รถจักรยานยนต์',
                '2' => 'รถยนต์'
            ],
            'ownertype' => [
                '1' => 'ผู้ขออนุญาตเป็นเจ้าของรถ',
                '2' => 'ผู้ขออนุญาตไม่ใช่เจ้าของรถ'
            ],
            'operateby' => [
                '1' => 'ผู้ขออนุญาตยื่นคำขอด้วยตนเอง',
                '2' => 'ผู้ขออนุญาตให้บริษัทยื่นคำขอแทน',
                '3'=>'ผู้ขออนุญาตให้มอบอำนาจให้บุคคลอื่นยื่นคำขอแทน'
            ]
        );


        if (isset($code)) {
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        } else {
            return isset($_items[$type]) ? $_items[$type] : false;
        }
    }

}
