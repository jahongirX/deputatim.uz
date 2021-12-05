<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deputat".
 *
 * @property int $id
 * @property string $fio
 * @property int $viloyat
 * @property int $region
 * @property int $okrug
 * @property int $problems
 * @property int $solved
 * @property string $contacts
 */
class Deputat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'deputat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'viloyat', 'region', 'okrug', 'problems', 'solved', 'contacts'], 'required'],
            [['viloyat', 'region', 'okrug', 'problems', 'solved'], 'integer'],
            [['contacts'], 'string'],
            [['fio'], 'string', 'max' => 500],
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
            'viloyat' => 'Viloyat',
            'region' => 'Region',
            'okrug' => 'Okrug',
            'problems' => 'Problems',
            'solved' => 'Solved',
            'contacts' => 'Contacts',
        ];
    }
}
