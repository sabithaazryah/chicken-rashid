<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "menus".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $image_alt_tag
 * @property string $price
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Menus extends \yii\db\ActiveRecord {

        /**
         * {@inheritdoc}
         */
        public static function tableName() {
                return 'menus';
        }

        /**
         * {@inheritdoc}
         */
        public function rules() {
                return [
                        [['description'], 'string'],
                        [['status', 'CB', 'UB'], 'integer'],
                        [['DOC', 'DOU'], 'safe'],
                        [['name', 'image', 'image_alt_tag', 'price'], 'string', 'max' => 250],
                        [['name', 'image', 'description'], 'required', 'on' => 'create'],
                        [['image'], 'file', 'extensions' => 'jpg, gif, png,jpeg'],
                ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'name' => 'Name',
                    'description' => 'Description',
                    'image' => 'Image',
                    'image_alt_tag' => 'Image Alt Tag',
                    'price' => 'Price',
                    'status' => 'Status',
                    'CB' => 'Cb',
                    'UB' => 'Ub',
                    'DOC' => 'Doc',
                    'DOU' => 'Dou',
                ];
        }

}
