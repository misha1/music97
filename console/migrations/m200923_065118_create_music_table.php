<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%music}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m200923_065118_create_music_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%music}}', [
            'music_id' => $this->string(16)->notNull(),
            'title' => $this->string(512)->notNull(),
            'description' => $this->text(),
            'lyrics' => $this->text(),
            'music_name' => $this->text(512)->notNull(),
            'author_name' => $this->text(512)->notNull(),
            'status' => $this->integer(1),
//          'has_thumbnail' => $this->boolean(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        $this->addPrimaryKey('PK_music_music_id', '{{%music}}', 'music_id');

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-music-created_by}}',
            '{{%music}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-music-created_by}}',
            '{{%music}}',
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
            '{{%fk-music-created_by}}',
            '{{%music}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-music-created_by}}',
            '{{%music}}'
        );

        $this->dropTable('{{%music}}');
    }
}
