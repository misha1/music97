<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test_question}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%test}}`
 */
class m201019_125831_create_test_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test_question}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->string(16),
            'count_answer' => $this->integer(),
            'name' => $this->text(),
            'timer' => $this->time(),
            'answer' => $this->string(),
            'has_thumbnail' => $this->boolean(),
            'has_music' => $this->boolean(),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-test_question-question_id}}',
            '{{%test_question}}',
            'question_id'
        );

        // add foreign key for table `{{%test}}`
        $this->addForeignKey(
            '{{%fk-test_question-question_id}}',
            '{{%test_question}}',
            'question_id',
            '{{%test}}',
            'test_id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%test}}`
        $this->dropForeignKey(
            '{{%fk-test_question-question_id}}',
            '{{%test_question}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-test_question-question_id}}',
            '{{%test_question}}'
        );

        $this->dropTable('{{%test_question}}');
    }
}
