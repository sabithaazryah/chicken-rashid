<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "avensia_tech_content".
 *
 * @property int $id
 * @property string $information_technology
 * @property string $technical
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class AvensiaTechContent extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'avensia_tech_content';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['information_technology', 'technical'], 'string'],
			[['status', 'CB', 'UB'], 'integer'],
			[['information_technology', 'technical'], 'required'],
			[['DOC', 'DOU'], 'safe'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
		    'id' => 'ID',
		    'information_technology' => 'Information Technology',
		    'technical' => 'Technical Services',
		    'status' => 'Status',
		    'CB' => 'Cb',
		    'UB' => 'Ub',
		    'DOC' => 'Doc',
		    'DOU' => 'Dou',
		];
	}

}
