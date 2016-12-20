<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pointorder".
 *
 * @property integer $id
 * @property string $order
 * @property string $app
 * @property string $ad
 * @property string $user
 * @property string $chn
 * @property double $points
 * @property string $sig
 * @property integer $adid
 * @property string $pkg
 * @property string $device
 * @property integer $time
 * @property string $price
 * @property string $trade_type
 * @property string $created_at
 * @property string $updated_at
 * @property string $ip
 * @property string $referer
 */
class Pointorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pointorder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['points'], 'number'],
            [['adid', 'time'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['order', 'app', 'ad', 'user', 'chn', 'sig', 'pkg', 'device', 'price', 'trade_type', 'referer'], 'string', 'max' => 255],
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
            'order' => 'Order',
            // 'app' => 'App',
            'ad' => 'Ad',
            'user' => 'User',
            'chn' => 'Chn',
            'points' => 'Points',
            'sig' => 'Sig',
            'adid' => 'Adid',
            'pkg' => 'Pkg',
            'device' => 'Device',
            'time' => 'Time',
            'price' => 'Price',
            'trade_type' => 'Trade Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ip' => 'Ip',
            'referer' => 'Referer',
        ];
    }
}
