<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "it_products".
 *
 * @property int $id
 * @property string $product_name
 * @property string $product_image
 * @property string $alt_tag
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class ItProducts extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'it_products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['product_name', 'product_image', 'alt_tag'], 'string', 'max' => 100],
            [['product_image'], 'required', 'on' => 'create'],
            [['product_image'], 'file', 'extensions' => 'jpg, png,jpeg'],
            [['product_name', 'alt_tag'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'product_image' => 'Product Image',
            'alt_tag' => 'Alt Tag',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
