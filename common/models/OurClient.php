<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "our_client".
 *
 * @property int $id
 * @property string $client_name
 * @property string $logo
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class OurClient extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'our_client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC', 'DOU'], 'safe'],
            [['client_name'], 'required'],
            [['client_name'], 'string', 'max' => 200],
            [['logo'], 'string', 'max' => 100],
            [['logo'], 'required', 'on' => 'create'],
            [['logo'], 'file', 'extensions' => 'jpg, png,jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'client_name' => 'Client Name',
            'logo' => 'Logo',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
