<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $id
 * @property string $PRV_CODE
 * @property string $PRV_DESC
 * @property string $PRV_ABREV
 * @property string $PRV_ENG_DESC
 * @property string $PRV_ABREV_ENG
 * @property string $UPD_USER_CODE
 * @property string $LAST_UPD_DATE
 * @property string $CREATE_USER_CODE
 * @property string $CREATE_DATE
 * @property string $REGION_CODE
 * @property string $OLD_REGION_CODE
 * @property string $TRS_JOB_CODE
 * @property string $PRV_CODE_INSURE
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRV_CODE', 'PRV_DESC'], 'required'],
            [['PRV_CODE'], 'string', 'max' => 6],
            [['PRV_DESC', 'PRV_ABREV', 'PRV_ENG_DESC', 'PRV_ABREV_ENG', 'UPD_USER_CODE', 'LAST_UPD_DATE', 'CREATE_USER_CODE', 'CREATE_DATE', 'REGION_CODE', 'OLD_REGION_CODE', 'TRS_JOB_CODE', 'PRV_CODE_INSURE'], 'string', 'max' => 45],
            [['PRV_CODE'], 'unique'],
            [['PRV_DESC'], 'unique'],
            [['PRV_ABREV'], 'unique'],
            [['PRV_ENG_DESC'], 'unique'],
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
            'PRV_DESC' => 'Prv  Desc',
            'PRV_ABREV' => 'Prv  Abrev',
            'PRV_ENG_DESC' => 'Prv  Eng  Desc',
            'PRV_ABREV_ENG' => 'Prv  Abrev  Eng',
            'UPD_USER_CODE' => 'Upd  User  Code',
            'LAST_UPD_DATE' => 'Last  Upd  Date',
            'CREATE_USER_CODE' => 'Create  User  Code',
            'CREATE_DATE' => 'Create  Date',
            'REGION_CODE' => 'Region  Code',
            'OLD_REGION_CODE' => 'Old  Region  Code',
            'TRS_JOB_CODE' => 'Trs  Job  Code',
            'PRV_CODE_INSURE' => 'Prv  Code  Insure',
            'BOR_FLAG'=>'จังหวัดที่มีด่านพรมแดน',
        ];
    }
}
