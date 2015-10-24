<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task_project".
 *
 * @property integer $id
 * @property string $title
 * @property integer $progress
 * @property string $parent
 * @property string $detail
 */
class TaskProject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['progress'], 'integer'],
            [['detail'], 'string'],
            [['title'], 'string', 'max' => 150],
            [['parent'], 'string', 'max' => 255]
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
            'progress' => 'Progress',
            'parent' => 'Parent',
            'detail' => 'Detail',
        ];
    }
}
