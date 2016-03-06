<?php

namespace app\models\activerecord;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $code
 * @property integer $party_id
 * @property integer $voting_area
 * @property integer $candidacy_area
 * @property integer $vote_id
 *
 * @property Credentials[] $credentials
 * @property Areas $candidacyArea
 * @property Parties $party
 * @property Users $vote
 * @property Users[] $users
 * @property Areas $votingArea
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['party_id', 'voting_area', 'candidacy_area', 'vote_id'], 'integer'],
            [['name', 'email', 'code'], 'string', 'max' => 255]
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
            'email' => 'Email',
            'code' => 'Code',
            'party_id' => 'Party ID',
            'voting_area' => 'Voting Area',
            'candidacy_area' => 'Candidacy Area',
            'vote_id' => 'Vote ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredentials()
    {
        return $this->hasMany(Credentials::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCandidacyArea()
    {
        return $this->hasOne(Areas::className(), ['id' => 'candidacy_area']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParty()
    {
        return $this->hasOne(Parties::className(), ['id' => 'party_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVote()
    {
        return $this->hasOne(Users::className(), ['id' => 'vote_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['vote_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVotingArea()
    {
        return $this->hasOne(Areas::className(), ['id' => 'voting_area']);
    }
}
