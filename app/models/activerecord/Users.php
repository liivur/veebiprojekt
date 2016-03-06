<?php

namespace app\models\activerecord;

use Yii;
use yii\base\Security;
use yii\web\IdentityInterface;

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
 * @property integer $is_admin
 * @property string $username 
 * @property string $password 
 *
 * @property Credentials[] $credentials
 * @property Areas $candidacyArea
 * @property Parties $party
 * @property Users $vote
 * @property Users[] $users
 * @property Areas $votingArea
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    private $_authKey;

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
            [['party_id', 'voting_area', 'candidacy_area', 'vote_id', 'is_admin'], 'integer'],
            [['username'], 'required'],
            [['name', 'email', 'code', 'username', 'password'], 'string', 'max' => 255]
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
            'is_admin' => 'Is Admin',
            'username' => 'Username', 
            'password' => 'Password', 
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $credential = Credentials::find(['token' => $token])->with('user')->one();
        if ($credential && $credential->user) {
            return $credential->user;
        }
        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        if (!$this->_authKey) {
            $credential = Credentials::findOne(['user_id' => $this->id, 'type' => Credentials::AUTH_KEY]);
            $this->_authKey = $credential->token;
        }
        return $this->_authKey;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }

    public function setPassword($password)
    {
        $this->password = Security::generatePasswordHash($password);
    }

    public function afterSave($insert)
    {
        parent::afterSave($insert);
        if ($insert) {
            $this->_authKey = \Yii::$app->security->generateRandomString();
            $credential = new Credentials;
            $credential->user_id = $this->id;
            $credential->type = Credentials::AUTH_KEY;
            $credential->token = $this->_authKey;
            $credential->save();
        }
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
