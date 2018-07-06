<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $image
 * @property string $title
 * @property string $sub_title
 * @property string $alt_tag
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Slider extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['alt_tag'], 'required'],
                [['image', 'title', 'sub_title', 'alt_tag'], 'string', 'max' => 100],
                [['image'], 'required', 'on' => 'create'],
                [['image'], 'file', 'extensions' => 'jpg, png,jpeg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'title' => 'Title',
            'sub_title' => 'Sub Title',
            'alt_tag' => 'Alt Tag',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
