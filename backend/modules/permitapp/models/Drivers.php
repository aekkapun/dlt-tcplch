<?php

namespace backend\modules\permitapp\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\web\UploadedFile;
use yii\helpers\BaseFileHelper;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "drivers".
 *
 * @property integer $id
 * @property integer $drivers_gender
 * @property string $drivers_name
 * @property string $drivers_lastname
 * @property string $drivers_passport
 * @property string $drivers_licence
 * @property integer $appilcant_id
 * @property integer $car_id
 * @property integer $status
 * @property integer $blacklist_status
 * @property string $blacklist_date
 * @property string $comment
 * @property integer $create_at
 * @property integer $create_by
 * @property integer $update_at
 * @property integer $update_by
 *
 * @property DriverBlacklist[] $driverBlacklists
 * @property Applicant $appilcant
 * @property CarDetail $car
 */
class Drivers extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    const UPLOAD_FOLDER = 'driver_file';
    const UPLOAD_PATH = 'driver_file';
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    public static function tableName() {
        return 'drivers';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => 'update_at',
            //'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_by',
                'updatedByAttribute' => 'update_by'
            ]
        ];
    }

    public function rules() {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            [['drivers_title', 'drivers_name', 'drivers_lastname', 'drivers_passport', 'drivers_licence'], 'required'],
            [['drivers_title', 'appilcant_id', 'status', 'blacklist_status', 'create_at', 'create_by', 'update_at', 'update_by'], 'integer'],
            [['drivers_name', 'drivers_lastname', 'blacklist_date', 'comment'], 'string', 'max' => 45],
            //[['docs'], 'file', 'maxFiles' => 2],
            [['drivers_passport'], 'string', 'max' => 13],
            [['drivers_licence'], 'string', 'max' => 13],
            [['ref'], 'string', 'max' => 50],
            [['ref'], 'unique'],
            //[['docs'], 'file', 'maxFiles' => 2, 'skipOnEmpty' => true]
                //[['drivers_passport'], 'unique'],
                //[['drivers_licence'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'drivers_title' => 'เพศ',
            'drivers_name' => 'ชื่อ',
            'drivers_lastname' => 'นามสกุล',
            'drivers_passport' => 'หนังสือเดินทาง',
            'drivers_licence' => 'ใบอนุญาตขับรถ',
            'appilcant_id' => 'หมายเลขคำขอ',
            'docs' => 'แนบหลักฐาน (ใบขับขี่,หนังสือเดินทาง) ',
            'status' => 'Status',
            'blacklist_status' => 'สถาน blacklist',
            'blacklist_date' => 'Blacklist Date',
            'comment' => 'Comment',
            'ref' => 'Ref',
            'create_at' => 'วันที่บันทึก',
            'create_by' => 'บันทึกโดย',
            'update_at' => 'วันที่อัพเดท',
            'update_by' => 'อัพเดทโดย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDriverBlacklists() {
        return $this->hasMany(DriverBlacklist::className(), ['driver_id' => 'id']);
    }

    public function getFullname() {
        return $this->drivers_name . '  ' . $this->drivers_lastname;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppilcant() {
        return $this->hasOne(Applicant::className(), ['id' => 'appilcant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
      public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function listDownloadFiles($type){
     $docs_file = '';
     if(in_array($type, ['docs','covenant'])){         
             $data = $type==='docs'?$this->docs:$this->covenant;
             $files = Json::decode($data);
            if(is_array($files)){
                 $docs_file ='<ul>';
                 foreach ($files as $key => $value) {
                    $docs_file .= '<li>'.Html::a($value,['/freelance/download','id'=>$this->id,'file'=>$key,'file_name'=>$value]).'</li>';
                 }
                 $docs_file .='</ul>';
            }
     }
     
     return $docs_file;
    }

    public function initialPreview($data,$field,$type='file'){
            $initial = [];
            $files = Json::decode($data);
            if(is_array($files)){
                 foreach ($files as $key => $value) {
                    if($type=='file'){
                        $initial[] = "<div class='file-preview-other'><h2><i class='glyphicon glyphicon-file'></i></h2></div>";
                    }elseif($type=='config'){
                        $initial[] = [
                            'caption'=> $value,
                            'width'  => '120px',
                            //'url'    => Url::to(['/permitapp/drivers/deletefile','id'=>$this->id,'fileName'=>$key,'field'=>$field]),
                            'url'    => Url::to(['/permitapp/drivers/deletefile', 'id' => $this->id, 'fileName' => $key, 'field' => $field]),
                            'key'    => $key
                        ];
                    }
                    else{
                        $initial[] = Html::img(self::getUploadUrl().$this->ref.'/'.$value,['class'=>'file-preview-image', 'alt'=>$model->file_name, 'title'=>$model->file_name]);
                    }
                 }
         }
        return $initial;
    }
}