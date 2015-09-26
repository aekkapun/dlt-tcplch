<?php

namespace backend\modules\permitapp\models;

use Yii;

/**
 * This is the model class for table "permit_app".
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
 *
 * @property CarDetail[] $carDetails
 */
class PermitApp extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'applicationdoc'; //folder upload @ webroot
    public static function tableName()
    {
        return 'permit_app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gender', 'fullname', 'passport', 'address', 'province', 'country', 'car_enroll_country', 'plates_number', 'start_date', 'end_date', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'dlt_office'], 'required'],
            [['gender', 'age', 'province', 'country', 'start_province', 'start_border_point', 'target_province', 'out_province', 'out_border_point', 'request_chanel', 'created_at', 'updated_at', 'cretaed_by', 'updated_by', 'approve_status', 'approve_by', 'approve_comment', 'dlt_office', 'dlt_br'], 'integer'],
            [['start_date', 'end_date', 'approve_date'], 'safe'],
            [['fullname', 'address'], 'string', 'max' => 255],
            [['passport', 'telephone'], 'string', 'max' => 13],
            [['car_enroll_country'], 'string', 'max' => 20],
            [['plates_number'], 'string', 'max' => 8]
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarDetails()
    {
        return $this->hasMany(CarDetail::className(), ['permitapp_no' => 'id']);
    }
    
        public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'sex' => array(
                '1' => 'ชาย',
                '2' => 'หญิง',
            ),
            'marital' => array(
                '1' => 'โสด',
                '2' => 'สมรส',
                '3' => 'อย่างร้าง',
                '4' => 'แยกกันอยู่',
                '5' => 'หมา้ย',
            ),
            'skill'=>[
                'Objective C'=>'Objective C',
                'Python'=>'Python',
                'Java'=>'Java',
                'JavaScript'=>'JavaScript',
                'PHP'=>'PHP',
                'SQL'=>'SQL',
                'Ruby'=>'Ruby',
                'FoxPro'=>'FoxPro',
                'C++'=>'C++',
                'C'=>'C',
                'ASP'=>'ASP',
                'Assembly'=>'Assembly',
                'Visual Basic'=>'Visual Basic'
            ],
            'social' => [
                'facebook' => 'Facebook',
                'twiter' => 'Twiter',
                'google+' => 'Google+',
                'tumblr' => 'Tumblr'
            ],
        );
        

        if (isset($code)){
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        }
        else{         
            return isset($_items[$type]) ? $_items[$type] : false;    
        }
    }
}
