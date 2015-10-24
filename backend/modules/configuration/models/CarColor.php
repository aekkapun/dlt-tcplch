<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "car_color".
 *
 * @property integer $id
 * @property string $color
 * @property string $color_code
 */
class CarColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['color'], 'required'],
            [['color', 'color_code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'color' => 'Color',
            'color_code' => 'Color Code',
        ];
    }
}
