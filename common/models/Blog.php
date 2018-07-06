<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $author
 * @property string $blog_heading
 * @property string $image
 * @property string $small_description
 * @property string $detailed_description
 * @property string $blog_date
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class Blog extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['small_description', 'detailed_description'], 'string'],
                [['blog_date', 'DOC', 'DOU'], 'safe'],
                [['author', 'blog_heading', 'small_description', 'detailed_description'], 'required'],
                [['status', 'CB', 'UB'], 'integer'],
                [['author', 'blog_heading', 'image'], 'string', 'max' => 100],
                [['small_description'], 'string', 'max' => 150],
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
            'author' => 'Author',
            'blog_heading' => 'Blog Heading',
            'image' => 'Image',
            'small_description' => 'Small Description',
            'detailed_description' => 'Detailed Description',
            'blog_date' => 'Blog Date',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
