<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pointorder;

/**
 * PointorderSearch represents the model behind the search form about `app\models\Pointorder`.
 */
class PointorderSearch extends Pointorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'adid', 'time'], 'integer'],
            [['order', 'app', 'ad', 'user', 'chn', 'sig', 'pkg', 'device', 'price', 'trade_type', 'created_at', 'updated_at', 'ip', 'referer'], 'safe'],
            [['points'], 'number'],
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
        $query = Pointorder::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'points' => $this->points,
            'adid' => $this->adid,
            'time' => $this->time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'order', $this->order])
            ->andFilterWhere(['like', 'app', $this->app])
            ->andFilterWhere(['like', 'ad', $this->ad])
            ->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'chn', $this->chn])
            ->andFilterWhere(['like', 'sig', $this->sig])
            ->andFilterWhere(['like', 'pkg', $this->pkg])
            ->andFilterWhere(['like', 'device', $this->device])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'trade_type', $this->trade_type])
            ->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'referer', $this->referer]);

        return $dataProvider;
    }
}
