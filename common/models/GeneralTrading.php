<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "general_trading".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $alt_tag
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property Product[] $products
 */
class GeneralTrading extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'general_trading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['description'], 'string'],
                [['status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['description', 'title', 'alt_tag', 'canonical_name'], 'required'],
                [['title', 'image', 'alt_tag'], 'string', 'max' => 100],
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
            'description' => 'Description',
            'image' => 'Image',
            'alt_tag' => 'Alt Tag',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Product::className(), ['general_trad_id' => 'id']);
    }

}
