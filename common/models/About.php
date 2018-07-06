<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $about_avensia
 * @property string $about_avensia_image
 * @property string $about_general_trending
 * @property string $general_trending_image
 * @property string $about_tech_solution
 * @property string $tech_solution_image
 * @property string $about_facility_management
 * @property string $facility_management_image
 * @property string $about_it
 * @property string $it_image
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class About extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['about_avensia', 'about_general_trending', 'about_tech_solution', 'about_facility_management', 'about_it'], 'string'],
                [['status', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['about_avensia', 'about_general_trending', 'about_tech_solution', 'about_facility_management', 'about_it'], 'required'],
                [['about_avensia_image', 'general_trending_image', 'tech_solution_image', 'facility_management_image', 'it_image'], 'string', 'max' => 100],
                [['about_avensia_image', 'general_trending_image', 'tech_solution_image', 'facility_management_image', 'it_image'], 'required', 'on' => 'create'],
                [['about_avensia_image', 'general_trending_image', 'tech_solution_image', 'facility_management_image', 'it_image'], 'file', 'extensions' => 'jpg,png,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'about_avensia' => 'About Avensia',
            'about_avensia_image' => 'About Avensia Image',
            'about_general_trending' => 'About General Trading',
            'general_trending_image' => 'General Trading Image',
            'about_tech_solution' => 'About Tech Solution',
            'tech_solution_image' => 'Tech Solution Image',
            'about_facility_management' => 'About Facility Management',
            'facility_management_image' => 'Facility Management Image',
            'about_it' => 'About Information Technology',
            'it_image' => 'Information Technology Image',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
