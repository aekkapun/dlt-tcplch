<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "customs".
 *
 * @property integer $id
 * @property integer $customs_office_id
 * @property string $customs_name
 * @property string $customs_prv
 * @property string $customs_amp
 * @property string $customs_zipcode
 * @property string $customs_tel
 *
 * @property Customsoffice $customsOffice
 */
class Customs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customs_office_id', 'customs_name', 'customs_prv'], 'required'],
            [['id', 'customs_office_id'], 'integer'],
            [['customs_name', 'customs_prv', 'customs_amp', 'customs_zipcode', 'customs_tel'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customs_office_id' => 'Customs Office ID',
            'customs_name' => 'Customs Name',
            'customs_prv' => 'Customs Prv',
            'customs_amp' => 'Customs Amp',
            'customs_zipcode' => 'Customs Zipcode',
            'customs_tel' => 'Customs Tel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomsOffice()
    {
        return $this->hasOne(Customsoffice::className(), ['id' => 'customs_office_id']);
    }
}
