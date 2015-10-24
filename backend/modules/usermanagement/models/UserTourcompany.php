<?php

namespace backend\modules\usermanagement\models;

use backend\modules\configuration\models\Province;
use backend\modules\usermanagement\models\Title;
use backend\modules\guide\models\TourCompany;
use common\models\User;
use Yii;

/**
 * This is the model class for table "user_tourcompany".
 *
 * @property integer $id
 * @property integer $license_no
 * @property string $trader_name
 * @property string $trader_name_en
 * @property string $trader_category
 * @property string $effective_date
 * @property string $expire_date
 * @property string $address
 * @property string $mobile_no
 * @property string $telephone
 * @property string $email
 * @property integer $user_id
 * @property integer $province
 * @property integer $amphur
 * @property integer $zipcode
 */
class UserTourcompany extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user_tourcompany';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['trader_name', 'address', 'mobile_no', 'email'], 'required'],
            [['user_id', 'province', 'amphur', 'zipcode'], 'integer'],
            [['license_no'], 'string', 'max' => 8],
            [['effective_date', 'expire_date'], 'safe'],
            [['trader_name', 'trader_name_en', 'trader_category', 'address', 'mobile_no', 'telephone', 'email'], 'string', 'max' => 255],
            ['license_no', 'exist', 'targetClass' => TourCompany::className(),'message' => 'ไม่พบเลขที่ใบอนุญาตในระบบ หรือ อาจยังไม่ได้ลงทะเบียนในระบบ จากกรมการท่องเที่ยว.'],
            //['license_no', 'required', 'message' => 'ไม่พบเลขที่ใบอนุญาตในระบบ.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'license_no' => 'เลขที่ใบอนุญาต',
            'trader_name' => 'บริษัท',
            'trader_name_en' => 'Trader Name En',
            'trader_category' => 'Trader Category',
            'effective_date' => 'Effective Date',
            'expire_date' => 'Expire Date',
            'address' => 'ที่อยู่',
            'mobile_no' => 'เบอร์โทร มือถือ',
            'telephone' => 'เบอร์โทรศัพทท์',
            'email' => 'อีเมล์',
            'user_id' => 'User ID',
            'province' => 'Province',
            'amphur' => 'Amphur',
            'zipcode' => 'Zipcode',
        ];
    }

}
