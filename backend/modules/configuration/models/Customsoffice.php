<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "customsoffice".
 *
 * @property integer $id
 * @property string $customs_officec
 *
 * @property Customs[] $customs
 */
class Customsoffice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customsoffice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customs_officec'], 'required'],
            [['customs_officec'], 'string', 'max' => 45],
            [['customs_officec'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customs_officec' => 'Customs Officec',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustoms()
    {
        return $this->hasMany(Customs::className(), ['customs_office_id' => 'id']);
    }
}
