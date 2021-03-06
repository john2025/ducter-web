<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DcmdServiceArchDiagram;

/**
 * DcmdServiceArchDiagramSearch represents the model behind the search form about `app\models\DcmdServiceArchDiagram`.
 */
class DcmdServiceArchDiagramSearch extends DcmdServiceArchDiagram
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'app_id', 'svr_id', 'opr_uid'], 'integer'],
            [['arch_name', 'diagram', 'comment', 'utime', 'ctime'], 'safe'],
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
        $query = DcmdServiceArchDiagram::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'app_id' => $this->app_id,
            'svr_id' => $this->svr_id,
            'utime' => $this->utime,
            'ctime' => $this->ctime,
            'opr_uid' => $this->opr_uid,
        ]);

        $query->andFilterWhere(['like', 'arch_name', $this->arch_name])
            ->andFilterWhere(['like', 'diagram', $this->diagram])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
