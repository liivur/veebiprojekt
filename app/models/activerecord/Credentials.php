<?php

namespace app\models\activerecord;

use Yii;

/**
 * This is the model class for table "credentials".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $type
 * @property string $token
 *
 * @property Users $user
 */
class Credentials extends \yii\db\ActiveRecord
{
    const AUTH_KEY = 1;
    const PASSWORD_RESET = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'credentials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'type'], 'integer'],
            [['token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'token' => 'Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
