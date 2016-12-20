<?php

namespace app\models;

use Yii;
use yii\db\Query;

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
 * @property integer $team
 */
class Account extends \yii\db\ActiveRecord
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
            [['team'], 'integer'],
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
            'team' => 'Team',
        ];
    }

    public static function allMonthIncome($member=0)
    {
        $query = new Query();
        if ($member > 0) {
          $zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $slz  = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $dhhf  = $query->from('baiduorder_dhhf')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $zwxhb  = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          return sprintf('%.2f', ($zhuan16/100)*0.92)+sprintf('%.2f', ($llz/100)*0.92)+sprintf('%.2f', ($hbz/100)*0.92)+sprintf('%.2f', ($slz/1000)*0.92+sprintf('%.2f', ($dhhf/200)*0.92)+sprintf('%.2f', ($zwxhb/100)*0.92));
        }
        else {
          $zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
          $llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
          $hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
          $slz  = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
          $dhhf  = $query->from('baiduorder_dhhf')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
          $zwxhb  = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', date('Y-m-01 00:00:00'), date('Y-m-31 23:59:59')])->sum('score');//当月收入;
          return sprintf('%.2f', ($zhuan16/100)*0.92)+sprintf('%.2f', ($llz/100)*0.92)+sprintf('%.2f', ($hbz/100)*0.92)+sprintf('%.2f', ($slz/1000)*0.92+sprintf('%.2f', ($dhhf/200)*0.92)+sprintf('%.2f', ($zwxhb/100)*0.92));
        }
    }

    public static function allDayIncome($member)
    {
        $query = new Query();
        if ($member == 0) {
          //$zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          //$llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          //$hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          // return sprintf('%.2f', ($zhuan16/100)*0.92)+sprintf('%.2f', ($llz/100)*0.92)+sprintf('%.2f', ($hbz/100)*0.92);
          $zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当月收入;
          $llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当月收入;
          $hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当月收入;
          $slz  = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当月收入;
          $dhhf  = $query->from('baiduorder_dhhf')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当月收入;
          $zwxhb  = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->sum('score');//当月收入;
          // return $zhuan16 + $llz + $hbz;
          return sprintf('%.2f', ($zhuan16/100)*0.92)+sprintf('%.2f', ($llz/100)*0.92)+sprintf('%.2f', ($hbz/100)*0.92)+sprintf('%.2f', ($slz/1000)*0.92+sprintf('%.2f', ($dhhf/200)*0.92)+sprintf('%.2f', ($zwxhb/100)*0.92));
        }
        else {
          $zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $slz  = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $dhhf  = $query->from('baiduorder_dhhf')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          $zwxhb  = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59')])->andWhere(['=', 'team' , $member])->sum('score');//当月收入;
          return sprintf('%.2f', ($zhuan16/100)*0.92)+sprintf('%.2f', ($llz/100)*0.92)+sprintf('%.2f', ($hbz/100)*0.92)+sprintf('%.2f', ($slz/1000)*0.92+sprintf('%.2f', ($dhhf/200)*0.92)+sprintf('%.2f', ($zwxhb/100)*0.92));
        }
    }

    public static function allYesterdayIncome($query, $member=0)
    {
        $yesterday = strtotime('-1 day');

        if ($member > 0) {
          $zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' ,$member])->sum('score');//当月收入;
          $llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' ,$member])->sum('score');//当月收入;
          $hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' ,$member])->sum('score');//当月收入;
          $slz  = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' ,$member])->sum('score');//当月收入;
          $dhhf  = $query->from('baiduorder_dhhf')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' ,$member])->sum('score');//当月收入;
          $zwxhb  = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->andWhere(['=', 'team' ,$member])->sum('score');//当月收入;
        }
        else {
          $zhuan16 = $query->from('baiduorder')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//当月收入;
          $llz = $query->from('baiduorder_llz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//当月收入;
          $hbz  = $query->from('baiduorder_zhb')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//当月收入;
          $slz  = $query->from('baiduorder_slz')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//当月收入;
          $dhhf  = $query->from('baiduorder_dhhf')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//当月收入;
          $zwxhb  = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', date('Y-m-d 00:00:00', $yesterday), date('Y-m-d 23:59:59', $yesterday)])->sum('score');//当月收入;
        }
        return sprintf('%.2f', ($zhuan16/100)*0.92)+sprintf('%.2f', ($llz/100)*0.92)+sprintf('%.2f', ($hbz/100)*0.92)+sprintf('%.2f', ($slz/1000)*0.92+sprintf('%.2f', ($dhhf/200)*0.92)+sprintf('%.2f', ($zwxhb/100)*0.92));
    }

    public static function allInCount($query, $number)
    {
      $team = isset($number)?$number:0;
      $yesterday = isset($_GET['y'])?$_GET['y']:0;
      $startDate = date('Y-m-d 00:00:00');
      $endDate = date('Y-m-d 23:59:59');
      if ( $yesterday > 0 ) {
        $startDate = date('Y-m-d 00:00:00', strtotime('-1 day'));
        $endDate = date('Y-m-d 23:59:59', strtotime('-1 day'));
      }
      if ($team > 0) {
        $bdcount = $query->from('baiduorder')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$team])->count();
        $bdzhbcount = $query->from('baiduorder_zhb')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$team])->count();
        $bdllzcount = $query->from('baiduorder_llz')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$team])->count();
        $bdslzcount = $query->from('baiduorder_slz')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$team])->count();
        $bddhhfcount = $query->from('baiduorder_dhhf')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$team])->count();
        $zwxhbcount = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$team])->count();
      }
      else {
        $bdcount = $query->from('baiduorder')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdzhbcount = $query->from('baiduorder_zhb')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdllzcount = $query->from('baiduorder_llz')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdslzcount = $query->from('baiduorder_slz')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bddhhfcount = $query->from('baiduorder_dhhf')->where(['between', 'created_at', $startDate, $endDate])->count();
        $zwxhbcount = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', $startDate, $endDate])->count();
      }
      return $bdcount + $bdzhbcount + $bdllzcount + $bdslzcount + $bddhhfcount + $zwxhbcount;
    }

    public static function allYesterdayInCount($query, $member=0)
    {
    //  return 0;
      $startDate = date('Y-m-d 00:00:00', strtotime('-1 day'));
      $endDate = date('Y-m-d 23:59:59', strtotime('-1 day'));
      if ($member > 0) {
        $bdcount = $query->from('baiduorder')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bdzhbcount = $query->from('baiduorder_zhb')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bdllzcount = $query->from('baiduorder_llz')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bdslzcount = $query->from('baiduorder_slz')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bddhhfcount = $query->from('baiduorder_dhhf')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $zwxhbcount = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
      }
      else {
        $bdcount = $query->from('baiduorder')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdzhbcount = $query->from('baiduorder_zhb')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdllzcount = $query->from('baiduorder_llz')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdslzcount = $query->from('baiduorder_slz')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bddhhfcount = $query->from('baiduorder_dhhf')->where(['between', 'created_at', $startDate, $endDate])->count();
        $zwxhbcount = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', $startDate, $endDate])->count();
      }
      return $bdcount + $bdzhbcount + $bdllzcount + $bdslzcount + $bddhhfcount + $zwxhbcount;

    }

    public static function allMonthInCount($query, $member=0)
    {
    //  return 0;
      $yesterday = isset($_GET['y'])?$_GET['y']:0;
      $startDate = date('Y-m-01 00:00:00');
      $endDate = date('Y-m-31 23:59:59');
      if ($member > 0 ) {
        $bdcount = $query->from('baiduorder')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bdzhbcount = $query->from('baiduorder_zhb')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bdllzcount = $query->from('baiduorder_llz')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bdslzcount = $query->from('baiduorder_slz')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $bddhhfcount = $query->from('baiduorder_dhhf')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
        $zwxhbcount = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', $startDate, $endDate])->andWhere(['=', 'team' ,$member])->count();
      }

      else {
        $bdcount = $query->from('baiduorder')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdzhbcount = $query->from('baiduorder_zhb')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdllzcount = $query->from('baiduorder_llz')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bdslzcount = $query->from('baiduorder_slz')->where(['between', 'created_at', $startDate, $endDate])->count();
        $bddhhfcount = $query->from('baiduorder_dhhf')->where(['between', 'created_at', $startDate, $endDate])->count();
        $zwxhbcount = $query->from('baiduorder_zwxhb')->where(['between', 'created_at', $startDate, $endDate])->count();
      }
      return $bdcount + $bdzhbcount + $bdllzcount + $bdslzcount + $bddhhfcount + $zwxhbcount;
    }

}
