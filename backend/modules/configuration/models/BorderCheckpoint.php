<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "border_checkpoint".
 *
 * @property integer $id
 * @property integer $border_province
 * @property string $border_thai
 * @property string $border_other
 * @property string $border_land
 */
class BorderCheckpoint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'border_checkpoint';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['border_province', 'border_thai'], 'required'],
            [['border_province'], 'integer'],
            [['border_thai', 'border_other'], 'string', 'max' => 150],
            [['border_land'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'border_province' => 'Border Province',
            'border_thai' => 'Border Thai',
            'border_other' => 'Border Other',
            'border_land' => 'Border Land',
        ];
    }
}
