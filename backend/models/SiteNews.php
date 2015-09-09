<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "site_news".
 *
 * @property integer $id
 * @property string $title
 * @property string $thump
 * @property string $short
 * @property string $content
 * @property integer $views
 * @property integer $status
 * @property integer $create_at
 * @property integer $update_at
 * @property integer $create_by
 * @property integer $update_by
 * @property integer $category_id
 *
 * @property SiteCategory $category
 */
class SiteNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'short', 'content'], 'required'],
            [['content'], 'string'],
            [['views', 'status', 'create_at', 'update_at', 'create_by', 'update_by', 'category_id'], 'integer'],
            [['title', 'thump'], 'string', 'max' => 128],
            [['short'], 'string', 'max' => 1024]
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
            'short' => 'Short',
            'content' => 'Content',
            'views' => 'Views',
            'status' => 'Status',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(SiteCategory::className(), ['id' => 'category_id']);
    }
}
