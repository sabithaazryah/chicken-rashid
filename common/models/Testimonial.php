<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "testimonial".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $message
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Testimonial extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'testimonial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['message'], 'string', 'max' => 220],
                [['name', 'message'], 'required'],
                [['status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU', 'image'], 'safe'],
                [['name','customr_type'], 'string', 'max' => 100],
                [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'message' => 'Message',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
