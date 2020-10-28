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
 * @property Answer[] $answers
 * @property Test $question
 */
class TestQuestion extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;
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
            [['answer', 'name'], 'required'],
            [['has_thumbnail', 'has_music', 'created_at'], 'integer'],
            [['name'], 'string'],
            [['timer'], 'date', 'format' => 'H:m:s'],
            [['answer'], 'string'],
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
            'count_answer' => 'Количество ответов',
            'name' => 'Вопрос',
            'timer' => 'Таймер',
            'answer' => 'Правильный ответ',
            'has_thumbnail' => 'Изображения',
            'has_music' => 'Музыка',
            'created_at' => 'Добавлено',
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
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['question_id' => 'id']);
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
