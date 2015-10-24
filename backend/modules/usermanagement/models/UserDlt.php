<?php

namespace backend\modules\usermanagement\models;

use backend\modules\configuration\models\Province;
use backend\modules\usermanagement\models\Title;
use common\models\User;
use backend\modules\usermanagement\models\UserType;
use Yii;

/**
 * This is the model class for table "userdlt".
 *
 * @property integer $id
 * @property integer $title
 * @property string $name
 * @property string $lname
 * @property string $off_code
 * @property string $br_code
 * @property integer $emp_id
 * @property integer $id_no
 * @property string $org_code
 * @property integer $user_id
 */
class UserDlt extends \yii\db\ActiveRecord {

    /**
      {
      return 'userdlt';
     * @inheritdoc
     */
    public static function tableName() {
        return 'userdlt';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'name', 'lname', 'off_code', 'id_no'], 'required'],
            [['title', 'emp_id', 'id_no', 'user_id'], 'integer'],
            [['name', 'lname'], 'string', 'max' => 50],
            [['off_code', 'br_code'], 'string', 'max' => 5],
            [['org_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'title' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'lname' => 'นามสกุล',
            'off_code' => 'รหัสสำนักงานขนส่งจังหวัด',
            'br_code' => 'รหัสสำนักงานขนส่งสาขา',
            'emp_id' => 'รหัสเจ้าหน้าที่',
            'id_no' => 'เลขที่บัตรประชาชน',
            'org_code' => 'รหัสหน่วยงาน',
            'user_id' => 'User ID',
        ];
    }

    public function getProvince() {
        return @$this->hasOne(Province::className(), ['PRV_CODE' => 'off_code']);
    }

    public function getTitles() {
        return @$this->hasOne(Title::className(), ['id' => 'title']);
    }

    public function getUser() {
        return @$this->hasOne(User::className(), ['id' => 'user_id']);
    }


}
