<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lr_conferencemember".
 *
 * @property integer $id
 * @property string $openid
 * @property string $mobile
 * @property string $nickname
 * @property string $realname
 * @property string $role
 * @property string $photo
 * @property integer $cfid
 * @property string $created_at
 * @property string $updated_at
 */
class LrConferencemember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lr_conferencemember';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cfid'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['openid', 'mobile', 'nickname', 'realname', 'role', 'photo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'openid' => 'Openid',
            'mobile' => 'Mobile',
            'nickname' => 'Nickname',
            'realname' => 'Realname',
            'role' => 'Role',
            'photo' => 'Photo',
            'cfid' => 'Cfid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
