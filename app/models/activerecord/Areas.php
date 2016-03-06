<?php

namespace app\models\activerecord;

use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Users[] $users
 * @property Users[] $users0
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidates()
    {
        return $this->hasMany(Users::className(), ['candidacy_area' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoters()
    {
        return $this->hasMany(Users::className(), ['voting_area' => 'id']);
    }
}
