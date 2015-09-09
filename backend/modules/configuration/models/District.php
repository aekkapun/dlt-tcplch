<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property string $PRV_CODE
 * @property string $AMP_CODE
 * @property string $DIST_CODE
 * @property string $DIST_DESC
 * @property string $DIST_ENG_DESC
 * @property string $UPD_USER_CODE
 * @property string $LAST_UPD_DATE
 * @property string $CREATE_USER_CODE
 * @property string $CREATE_DATE
 * @property string $ZIP_CODE
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRV_CODE', 'AMP_CODE', 'DIST_CODE', 'DIST_DESC'], 'required'],
            [['PRV_CODE', 'AMP_CODE', 'DIST_CODE', 'DIST_DESC', 'DIST_ENG_DESC', 'UPD_USER_CODE', 'LAST_UPD_DATE', 'CREATE_USER_CODE', 'CREATE_DATE', 'ZIP_CODE'], 'string', 'max' => 45],
            [['DIST_DESC'], 'unique'],
            [['DIST_CODE'], 'unique']
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
            'DIST_CODE' => 'Dist  Code',
            'DIST_DESC' => 'Dist  Desc',
            'DIST_ENG_DESC' => 'Dist  Eng  Desc',
            'UPD_USER_CODE' => 'Upd  User  Code',
            'LAST_UPD_DATE' => 'Last  Upd  Date',
            'CREATE_USER_CODE' => 'Create  User  Code',
            'CREATE_DATE' => 'Create  Date',
            'ZIP_CODE' => 'Zip  Code',
        ];
    }
}
