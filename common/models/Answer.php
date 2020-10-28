<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%answer}}".
 *
 * @property int $id
 * @property string|null $question_id
 * @property string|null $answer
 * @property int|null $has_file
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%answer}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['answer'], 'required'],
            [['has_file', 'question_id'], 'integer'],
            [['answer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'answer' => 'варианты',
            'has_file' => 'Has File',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AnswerQuery(get_called_class());
    }
}
