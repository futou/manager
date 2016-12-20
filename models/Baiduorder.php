<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "baiduorder".
 *
 * @property integer $id
 * @property string $user
 * @property string $sn
 * @property string $pk
 * @property string $score
 * @property string $sg
 * @property string $created_at
 * @property string $updated_at
 * @property string $ip
 */
class Baiduorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'baiduorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'sn', 'pk', 'score', 'sg', 'ip'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['user', 'sn', 'pk', 'score', 'sg'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'sn' => 'Sn',
            'pk' => 'Pk',
            'score' => 'Score',
            'sg' => 'Sg',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ip' => 'Ip',
        ];
    }

    public function getpk()
    {
    	
    }
}
