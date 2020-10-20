<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%test_question}}".
 *
 * @property int $id
 * @property string|null $question_id
 * @property int|null $count_answer
 * @property string|null $name
 * @property string|null $timer
 * @property string|null $answer
 * @property int|null $has_thumbnail
 * @property int|null $has_music
 * @property int|null $created_at
 *
 * @property Test $question
 */
class TestQuestion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%test_question}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count_answer', 'has_thumbnail', 'has_music', 'created_at'], 'integer'],
            [['name'], 'string'],
            [['timer'], 'safe'],
            [['question_id'], 'string', 'max' => 16],
            [['answer'], 'string', 'max' => 255],
            [['question_id'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['question_id' => 'test_id']],
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
            'count_answer' => 'Count Answer',
            'name' => 'Name',
            'timer' => 'Timer',
            'answer' => 'Answer',
            'has_thumbnail' => 'Has Thumbnail',
            'has_music' => 'Has Music',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Question]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TestQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Test::className(), ['test_id' => 'question_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TestQuestionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TestQuestionQuery(get_called_class());
    }
}
