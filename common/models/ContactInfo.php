<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_info".
 *
 * @property int $id
 * @property string $email
 * @property string $general_trading_phone
 * @property string $it_phone
 * @property string $facility_management_phone
 * @property string $addtess
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 */
class ContactInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['addtess'], 'string'],
            [['status', 'CB', 'UB'], 'integer'],
            [['DOC'], 'safe'],
            [['email'], 'email'],
            [['addtess','general_trading_phone', 'it_phone','email','facility_management_phone'], 'required'],
            [['email'], 'string', 'max' => 100],
            [['general_trading_phone', 'it_phone'], 'string', 'max' => 25],
            [['facility_management_phone'], 'string', 'max' => 205],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'general_trading_phone' => 'General Trading Phone',
            'it_phone' => 'It Phone',
            'facility_management_phone' => 'Facility Management Phone',
            'addtess' => 'Addtess',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
        ];
    }
}
