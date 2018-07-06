<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $general_trad_id
 * @property string $product_name
 * @property string $product_image
 * @property string $alt_tag
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property GeneralTrading $generalTrad
 */
class Product extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['general_trad_id', 'status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['product_name', 'general_trad_id', 'alt_tag'], 'required'],
                [['product_name', 'product_image', 'alt_tag'], 'string', 'max' => 100],
                [['product_image'], 'required', 'on' => 'create'],
                [['product_image'], 'file', 'extensions' => 'jpg, png,jpeg'],
                [['general_trad_id'], 'exist', 'skipOnError' => true, 'targetClass' => GeneralTrading::className(), 'targetAttribute' => ['general_trad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'general_trad_id' => 'General Trade',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneralTrad() {
        return $this->hasOne(GeneralTrading::className(), ['id' => 'general_trad_id']);
    }

}
