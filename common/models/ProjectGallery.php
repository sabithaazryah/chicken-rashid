<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_gallery".
 *
 * @property int $id
 * @property string $project_title
 * @property string $image
 * @property string $alt_tag
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class ProjectGallery extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'project_gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['project_title', 'alt_tag'], 'required'],
                [['project_title', 'image', 'alt_tag'], 'string', 'max' => 100],
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
            'project_title' => 'Project Title',
            'image' => 'Image',
            'alt_tag' => 'Alt Tag',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
