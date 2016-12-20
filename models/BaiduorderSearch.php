<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Baiduorder;

/**
 * BaiduorderSearch represents the model behind the search form about `app\models\Baiduorder`.
 */
class BaiduorderSearch extends Baiduorder
{
	public static $pkLabel = [
		'com.xdwf.ddsqhb0127' => '打地鼠抢红包',
		'com.baidu.browser.apps' => '百度浏览器',
		'com.baidu.searchbox' => '手机百度',
		'com.ss.android.article.news' => '头条新闻',
		'com.baidu.BaiduMap' => '百度地图',
		'com.mrocker.m6go' => '麦乐购',
		'com.imohoo.shanpao' => '咪咕善跑',
		'com.xdwf.yhbdds' => '赢红包打地鼠',
		'com.migu.lobby' => '咪咕棋牌',
		'com.baidu.netdisk' => '百度云盘',
		'com.baidu.doctor.doctorask' => '拇指医生',
		'com.china3s.strip' => '春秋旅行',
		'com.aiyou.androidxsq001' => '西十区',
    'com.hsgame.quanwang2016' => '拳皇',
		'com.youku.phone' => '优酷',
		'com.sogou.map.android.maps' => '搜狗地图',
		'com.gangzhousc' => '广证股涨',
		'com.cmge.dz.xyermj' => '新欢乐麻将',
		'com.ydhs.fkdsc.cj' => '赢红包打地鼠',
		'com.zancheng.doudz1' => '单机斗地主',
		'com.baidu.mbaby' => '百度宝宝知道',
		'com.zancheng.xiaoxk' => '消消看',
		'cn.jj' => 'JJ斗地主',
		'com.cmge.kxxxlgw' => '开心消消乐',
		'com.chaozh.iReaderFree' => '掌阅ireadder',
		'com.bysun.dailystyle.buyer' => '火品',
		'com.etc.etc2mobile' => '乐速通',
		'com.aiwan.xmxx209.asz' => '代表星星消灭你',
		'com.zhangzhi.djddz' => '斗地主',
		'com.cjmbaidu03' => '超级玛丽夏天版',
		'com.sogou.novel' => '搜狗阅读',
		'com.autonavi.minimap' => '高德地图',
		'com.tongcheng.android' => '同程旅游',
		'com.duowan.mobile' => 'YY直播',
		'com.tongcheng.android' => '同程旅游',
		'com.ft.wow' => '超级马里奥',
		'lgxi.yxarc.wxzri.HWP2016_35' => '新水果忍者',
		// 'com.bjku.fstg.glyo' => '',
		'com.andreader.prein' => '咪咕阅读',
		// 'com.easefun.godlegend.gly' => '',
		// 'com.bjkx.xmtguo.glyo' => '',
		'com.lord4m.main' => '马上斗地主',
		// 'com.easefun.godlegend.gly' => '',s
		'com.game.happycrush.zancheng1' => '欢乐斗地主',
		'com.game.hllandlords.zancheng2' => '欢乐斗地主',
		'com.msms.happycrush.zancheng2' => '欢乐斗地主',
		'com.kdwx.fkllk' => '疯狂连连看',
		'com.halfbrick.fruitninjamini.hsjfa' => '切水果',
		'lztm.pnvzi.cfba.HWP2016_35' => '新水果忍者酷爽版',
		'yes.sciyd.tbbwoh.HWP2016_182' => '超级玛丽',
		'com.tianx.jxa' => '3D超级玛丽白金版',
		'com.gygrxdf.mncxf' => '消灭星星欢乐版',
		'com.migolehe' => '米900',
		'com.bjkx.xmtguo.glyo' => '消灭星星2粉粹糖果',
		'gmi.mxjx.fsqqui.HWP2016_182' => '熊二快跑'
	];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['user', 'sn', 'pk', 'score', 'sg', 'created_at', 'updated_at', 'ip'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
				$team = isset($params['team'])?$params['team']:1;
        $query = Baiduorder::find()->where(['=', 'team', $team]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 10],
            // 'criteria' => ['order'=>'id DESC'],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'sn', $this->sn])
            ->andFilterWhere(['like', 'pk', $this->pk])
            ->andFilterWhere(['like', 'score', $this->score])
            ->andFilterWhere(['like', 'sg', $this->sg])
            ->andFilterWhere(['like', 'ip', $this->ip]);
        return $dataProvider;
    }

    public static function replaceLabel($label)
    {
    	$newLabel = $label;
    	if(array_key_exists($label,BaiduorderSearch::$pkLabel))
    	{
    		$newLabel = BaiduorderSearch::$pkLabel[$label];
    	}
    	return $newLabel;
    }
}
