<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "facility_management_details".
 *
 * @property int $id
 * @property string $service
 * @property string $canonical_name
 * @property string $main_content
 * @property string $image
 * @property string $sub_title
 * @property string $sub_content
 * @property string $equipment_list
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class FacilityManagementDetails extends \yii\db\ActiveRecord {

    public $our_partners;
    public $project_gallery;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'facility_management_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['main_content', 'sub_content', 'equipment_list'], 'string'],
                [['status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['main_content', 'service', 'canonical_name'], 'required'],
                [['service', 'canonical_name', 'equipment_list_title', 'gallery_title'], 'string', 'max' => 100],
                [['image'], 'string', 'max' => 50],
                [['sub_title'], 'string', 'max' => 200],
                [['our_partners', 'project_gallery'], 'file', 'extensions' => 'jpg, png,jpeg', 'maxFiles' => 100],
                [['image'], 'file', 'extensions' => 'jpg, png,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'service' => 'Service',
            'canonical_name' => 'Canonical Name',
            'main_content' => 'Main Content',
            'image' => 'Image',
            'sub_title' => 'Sub Title',
            'sub_content' => 'Sub Content',
            'equipment_list' => 'Equipment List',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
