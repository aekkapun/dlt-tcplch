<?php

namespace backend\modules\guide\models;
use backend\modules\guide\models\TourCompany;
use Yii;

/**
 * This is the model class for table "tour_company".
 *
 * @property integer $id
 * @property string $license_no
 * @property string $trader_name
 * @property string $trader_name_en
 * @property string $category
 * @property string $effective_date
 * @property string $expire_date
 * @property string $address
 * @property string $province
 * @property string $amphur
 * @property string $district
 * @property string $zipcode
 * @property integer $mobile_no
 * @property string $telephone
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $status
 */
class TourCompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['license_no', 'trader_name', 'trader_name_en', 'effective_date', 'expire_date'], 'required'],
            [['effective_date', 'expire_date'], 'safe'],
            [['mobile_no', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'integer'],
            [['license_no'], 'string', 'max' => 8],
            [['trader_name', 'trader_name_en'], 'string', 'max' => 128],
            [['category', 'address', 'telephone', 'email'], 'string', 'max' => 255],
            [['province', 'amphur', 'district', 'zipcode'], 'string', 'max' => 5],
            ['license_no', 'exist', 'targetClass' => TourCompany::className()] 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'license_no' => 'License No',
            'trader_name' => 'Trader Name',
            'trader_name_en' => 'Trader Name En',
            'category' => 'Category',
            'effective_date' => 'Effective Date',
            'expire_date' => 'Expire Date',
            'address' => 'Address',
            'province' => 'Province',
            'amphur' => 'Amphur',
            'district' => 'District',
            'zipcode' => 'Zipcode',
            'mobile_no' => 'Mobile No',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
        ];
    }
    
    public function getLicenseName(){
        return $this->license_no .'-'.$this->trader_name;
    }
    
}
