<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "kind".
 *
 * @property integer $id
 * @property string $name
 * @property integer $plt_type
 * @property string $code
 */
class Kind extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kind';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plt_type'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['code'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'plt_type' => 'ประเภทรถ',
            'code' => 'Code',
        ];
    }
}
