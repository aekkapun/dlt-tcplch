<?php

namespace backend\modules\usermanagement\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property integer $id
 * @property string $type
 * @property string $detail
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string', 'max' => 128],
            [['detail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'type' => 'กลุ่มผู้ใช้งาน',
            'detail' => 'รายละเอียด',
        ];
    }
    
    public function getUser(){
        return $this->hasMany(User::className(), ['user_type'=>'id']);
    }
}
