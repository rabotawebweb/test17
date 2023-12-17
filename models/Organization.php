<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property int $id
 * @property string $fio
 * @property string $email
 * @property string $phone
 *
 * @property EventsOrganization[] $eventsOrganizations
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'email', 'phone'], 'required'],
            [['fio', 'email', 'phone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'email' => 'Email',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[EventsOrganizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventsOrganizations()
    {
        return $this->hasMany(EventsOrganization::class, ['organization_id' => 'id']);
    }
}
