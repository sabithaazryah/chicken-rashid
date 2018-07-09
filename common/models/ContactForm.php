<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contact_form".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $date
 */
class ContactForm extends \yii\db\ActiveRecord {

        /**
         * {@inheritdoc}
         */
        public static function tableName() {
                return 'contact_form';
        }

        /**
         * {@inheritdoc}
         */
        public function rules() {
                return [
                        [['message', 'name', 'email', 'phone'], 'required'],
                        [['message'], 'string'],
                        [['date', 'item_id', 'type'], 'safe'],
                        [['name', 'email'], 'string', 'max' => 100],
                ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels() {
                return [
                    'id' => 'ID',
                    'name' => 'Name',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'message' => 'Message',
                    'date' => 'Date',
                ];
        }

}
