<?php

namespace backend\modules\configuration\models;

use Yii;

/**
 * This is the model class for table "car_brands".
 *
 * @property integer $id
 * @property string $code
 * @property string $desc
 */
class CarBrands extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_brands';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code'], 'string', 'max' => 5],
            [['desc'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'desc' => 'Desc',
        ];
    }
}
