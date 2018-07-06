<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "index_about".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $about_content_in_footer
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $linkedin_link
 * @property string $youtube_link
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class IndexAbout extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'index_about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'about_content_in_footer'], 'string'],
            [['content', 'about_content_in_footer','title'], 'required'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['title', 'facebook_link', 'twitter_link', 'linkedin_link', 'youtube_link'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'About Content In Home',
            'about_content_in_footer' => 'About Content In Footer',
            'facebook_link' => 'Facebook Link',
            'twitter_link' => 'Twitter Link',
            'linkedin_link' => 'Linkedin Link',
            'youtube_link' => 'Youtube Link',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }
}
