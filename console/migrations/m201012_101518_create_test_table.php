<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%test}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m201012_101518_create_test_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%test}}', [
            'test_id' => $this->string(16)->notNull(),
            'test_name' => $this->string()->notNull(),
            'description' => $this->text(),
            'failCount' => $this->integer(),
            'successCount' => $this->integer(),
            'created_by' => $this->integer(11),
            'updated_by' => $this->integer(11),
            'time' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

            $this->addPrimaryKey('PK_test_test_id','test','test_id');
        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-test-created_by}}',
            '{{%test}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-test-created_by}}',
            '{{%test}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-test-created_by}}',
            '{{%test}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-test-created_by}}',
            '{{%test}}'
        );

        $this->dropTable('{{%test}}');
    }
}
