<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property int $user_id
 * @property int $deputat_id
 * @property string $title
 * @property string $body
 * @property string $file
 * @property int $status
 * @property string $deputat_answer
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'deputat_id', 'title', 'body', 'status'], 'required'],
            [['user_id', 'deputat_id', 'status'], 'integer'],
            [['body', 'deputat_answer'], 'string'],
            [['title'], 'string', 'max' => 500],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'deputat_id' => 'Deputat ID',
            'title' => 'Muammo sarlavhasi',
            'body' => 'Muammo matni',
            'file' => 'Fayl',
            'status' => 'Status',
            'deputat_answer' => 'Deputat Javobi',
        ];
    }
}
