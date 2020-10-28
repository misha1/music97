<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%test_question}}`
 */
class m201021_065131_create_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answer}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->string(),
            'answer' => $this->string(),
            'has_file' => $this->boolean(),
        ]);

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-answer-question_id}}',
            '{{%answer}}',
            'question_id'
        );

        // add foreign key for table `{{%test_question}}`
        $this->addForeignKey(
            '{{%fk-answer-question_id}}',
            '{{%answer}}',
            'question_id',
            '{{%test_question}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%test_question}}`
        $this->dropForeignKey(
            '{{%fk-answer-question_id}}',
            '{{%answer}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-answer-question_id}}',
            '{{%answer}}'
        );

        $this->dropTable('{{%answer}}');
    }
}
