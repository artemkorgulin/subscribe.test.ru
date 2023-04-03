<?php
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Country Model
 *
 * @author Korgulin Artem <korgulin.a@subscribe.test.ru>
 */
class Country extends ActiveRecord
{
    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'prepareDataProvider' => function () {
                    $searchModel = new SearchModel();
                    return $searchModel->search(Yii::$app->request->queryParams);
                },
            ],
        ];
    }

	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'country';
	}

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['code'];
    }

    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required']
        ];
    }
}
