<?php

namespace backend\modules\usermanagement\models;

use Yii;

/**
 * This is the model class for table "title".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_en
 * @property string $detail
 */
class Title extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'title_en'], 'string', 'max' => 10],
            [['detail'], 'string', 'max' => 120]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'title_en' => 'Title En',
            'detail' => 'Detail',
        ];
    }
}
