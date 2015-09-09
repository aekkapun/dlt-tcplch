<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "site_category".
 *
 * @property integer $id
 * @property string $title
 * @property string $thump
 * @property integer $status
 *
 * @property SiteNews[] $siteNews
 */
class SiteCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status'], 'integer'],
            [['title', 'thump'], 'string', 'max' => 128],
            [['title'], 'unique']
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
            'thump' => 'Thump',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiteNews()
    {
        return $this->hasMany(SiteNews::className(), ['category_id' => 'id']);
    }
}
