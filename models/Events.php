<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property string $title
 * @property string|null $date
 * @property string|null $body
 *
 * @property EventsOrganization[] $eventsOrganizations
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body'], 'string'],
            [['title', 'date'], 'string', 'max' => 255],
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
            'date' => 'Date',
            'body' => 'Body',
        ];
    }

    /**
     * Gets query for [[EventsOrganizations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEventsOrganizations()
    {
        return $this->hasMany(EventsOrganization::class, ['events_id' => 'id']);
    }
}
