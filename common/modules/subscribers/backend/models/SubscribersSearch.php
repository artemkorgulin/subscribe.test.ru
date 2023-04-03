<?php

namespace common\modules\subscribers\backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\subscribers\common\models\Subscribers;

/**
 * SubscribersSearch represents the model behind the search form about `common\modules\subscribers\common\models\Subscribers`.
 */
class SubscribersSearch extends Subscribers
{
    public $eventName = '';
    public $blockedName = '';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['client'], 'string'],
            [['blockedName','eventName'], 'safe'],
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
        $query = Subscribers::find()->joinWith(['events','blockeds']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'name',
                    'joined',
                    'eventName' => [
                        'asc' => [ 'events.name' => SORT_ASC ],
                        'desc' => [ 'events.name' => SORT_DESC ],
                    ],
                    'blockedName' => [
                        'asc' => [ 'blocked.name' => SORT_ASC ],
                        'desc' => [ 'blocked.name' => SORT_DESC ],
                    ],
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['event']);
            $query->joinWith(['blockeds']);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'client' => $this->client
        ]);

        $query->andFilterWhere(['like', 'date_create', $this->date_create])
            ->andFilterWhere(['like', 'date_update', $this->date_update])
            ->andFilterWhere(['like', 'events.name', $this->eventName ])
            ->andFilterWhere(['like', 'blocked.name', $this->blockedName ]);

        return $dataProvider;
    }
}
