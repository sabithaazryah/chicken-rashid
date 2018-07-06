<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "facility_management".
 *
 * @property int $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class FacilityManagement extends \yii\db\ActiveRecord {

	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'facility_management';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['description'], 'string'],
			[['status', 'CB', 'UB'], 'integer'],
			[['DOC', 'DOU'], 'safe'],
			[['title', 'description','canonical_name'], 'required'],
			[['title', 'image'], 'string', 'max' => 100],
			[['image'], 'required', 'on' => 'create'],
			[['image'], 'file', 'extensions' => 'jpg, png,jpeg'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
		    'id' => 'ID',
		    'title' => 'Title',
		    'image' => 'Image',
		    'description' => 'Description',
		    'status' => 'Status',
		    'CB' => 'Cb',
		    'UB' => 'Ub',
		    'DOC' => 'Doc',
		    'DOU' => 'Dou',
		];
	}

}
