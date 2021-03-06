<?php

namespace backend\modules\usermanagement\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $is_block
 * @property integer $user_type
 *
 * @property LoginDetails[] $loginDetails
 * @property Usercustoms[] $usercustoms
 * @property Userdlt[] $userdlts
 * @property Userpolice[] $userpolices
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password_hash'], 'required'],
            [['status', 'created_at', 'updated_at', 'is_block', 'user_type'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
           //[['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'is_block' => 'Is Block',
            'user_type' => 'User Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoginDetails() {
        return $this->hasMany(LoginDetails::className(), ['login_user_id' => 'id']);
    }

    public function getUserType() {
        return $this->hasOne(UserType::className(), ['id' => 'user_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsercustoms() {
        return $this->hasMany(Usercustoms::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserdlts() {
        return $this->hasMany(Userdlt::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserpolices() {
        return $this->hasMany(Userpolice::className(), ['user_id' => 'id']);
    }

    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
        public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
        public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

}
