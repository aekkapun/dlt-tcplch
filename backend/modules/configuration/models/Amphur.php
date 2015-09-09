<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "amphur".
 *
 * @property integer $id
 * @property string $PRV_CODE
 * @property string $AMP_CODE
 * @property string $AMP_DESC
 * @property string $AMP_ENG_DESC
 * @property string $RESP_BR_CODE
 * @property string $UPD_USER_CODE
 * @property integer $LAST_UPD_DATE
 * @property string $CREATE_USER_CODE
 * @property integer $CREATE_DATE
 */
class Amphur extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amphur';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRV_CODE', 'AMP_CODE', 'AMP_DESC', 'AMP_ENG_DESC'], 'required'],
            [['LAST_UPD_DATE', 'CREATE_DATE'], 'integer'],
            [['PRV_CODE', 'AMP_CODE', 'AMP_DESC'], 'string', 'max' => 5],
            [['AMP_ENG_DESC'], 'string', 'max' => 100],
            [['RESP_BR_CODE'], 'string', 'max' => 55],
            [['UPD_USER_CODE', 'CREATE_USER_CODE'], 'string', 'max' => 45],
            [['AMP_CODE'], 'unique'],
            [['AMP_DESC'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'PRV_CODE' => 'Prv  Code',
            'AMP_CODE' => 'Amp  Code',
            'AMP_DESC' => 'Amp  Desc',
            'AMP_ENG_DESC' => 'Amp  Eng  Desc',
            'RESP_BR_CODE' => 'Resp  Br  Code',
            'UPD_USER_CODE' => 'Upd  User  Code',
            'LAST_UPD_DATE' => 'Last  Upd  Date',
            'CREATE_USER_CODE' => 'Create  User  Code',
            'CREATE_DATE' => 'Create  Date',
        ];
    }
}
