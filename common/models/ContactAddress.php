<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_address".
 *
 * @property int $id
 * @property string $address_title
 * @property string $address
 * @property string $telephone
 * @property string $fax
 * @property string $po_box
 * @property string $email
 * @property string $tech_solution_phone
 * @property string $general_trading_phone
 * @property string $it_phone
 * @property string $facility_management_phone
 * @property int $default_address
 * @property int $status
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 */
class ContactAddress extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'contact_address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['address'], 'string'],
                [['default_address', 'status', 'CB', 'UB'], 'integer'],
                [['address_title'], 'required'],
                [['DOC', 'DOU'], 'safe'],
                [['address_title', 'email'], 'string', 'max' => 100],
                [['telephone', 'fax', 'po_box', 'tech_solution_phone', 'general_trading_phone', 'it_phone', 'facility_management_phone'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'address_title' => 'Address Title',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'po_box' => 'Po Box',
            'email' => 'Email',
            'tech_solution_phone' => 'Tech Solution Phone',
            'general_trading_phone' => 'General Trading Phone',
            'it_phone' => 'It Phone',
            'facility_management_phone' => 'Facility Management Phone',
            'default_address' => 'Set as Default Address',
            'status' => 'Status',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

}
