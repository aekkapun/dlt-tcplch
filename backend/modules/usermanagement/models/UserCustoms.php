<?php

namespace backend\modules\usermanagement\models;

use backend\modules\usermanagement\models\Title;
use backend\modules\configuration\models\Province;
use backend\modules\configuration\models\BorderCheckpoint;
use Yii;

/**
 * This is the model class for table "usercustoms".
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
class Usercustoms extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'usercustoms';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['title', 'name', 'lname', 'off_code', 'br_code', 'id_no'], 'required'],
            [['title', 'emp_id', 'user_id'], 'integer'],
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
            'off_code' => 'รหัสสำนักงานศุลกากรส่งจังหวัด',
            'br_code' => 'รหัสด่านศุลกากร',
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

    public function getBorderPoint() {
        return @$this->hasOne(BorderCheckpoint::className(), ['id' => 'br_code']);
    }

}
